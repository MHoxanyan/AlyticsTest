<?php

namespace App\Console\Commands;

use App\CheckStatusType;
use App\Jobs\CheckUrl;
use App\Models\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class StartCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start checks';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $urls = Url::query()
            ->where('status', CheckStatusType::Finished->value);

        $urls->chunk(
            100,
            fn($urls) => $urls->each(
                fn($url) => CheckUrl::dispatch($url)
            )
        );
        $urls->update([
            'status' => CheckStatusType::InProgress,
        ]);

    }
}
