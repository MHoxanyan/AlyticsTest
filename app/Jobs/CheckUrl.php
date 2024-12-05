<?php

namespace App\Jobs;

use App\CheckStatusType;
use App\Models\Check;
use App\Models\Url;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * @property  int $tries
 */
class CheckUrl implements ShouldQueue
{
    use Queueable, Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Url $url,
    ) {
        $this->tries = $this->url->retry;
    }

    /**
     * Calculate the number of seconds to wait before retrying the job.
     *
     * @return array<int, int>
     */
    public function backOff(): array
    {
        $resp = [];
        for ($i = 1; $this->url->retry >= $i; $i++) {
            $resp[] = $this->url->retry_frequency * 1;
        }
        return $resp;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $resp = Http::get($this->url->url);
            Check::create([
                'url_id' => $this->url->id,
                'status_code' => $resp->status(),
                'response' => json_encode($resp->json()) ?? $resp->body(),
                'attempt' => $this->attempts(),
            ]);

            $this->url->update([
                'last_checked_at' => now(),
                'status' => CheckStatusType::Finished,
            ]);
            return;
        } catch (Throwable $th) {
            $this->logFailed($th);
            throw $th;
        }
    }

    private function logFailed(Throwable $e): void {
        Check::query()->create([
            'url_id' => $this->url->id,
            'status_code' => $e->getCode(),
            'response' => $e->getMessage(),
            'attempt' => $this->attempts(),
        ]);

        $this->url->update([
            'last_checked_at' => now(),
            'status' => $this->url->retry == $this->attempts()
                ? CheckStatusType::Finished
                : CheckStatusType::InProgress,
        ]);
    }
}
