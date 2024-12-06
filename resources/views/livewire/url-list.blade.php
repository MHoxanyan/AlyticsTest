<div class="container mx-auto pt-5 flex items-center w-4/6">
    <div wire:poll.5s class="bg-white p-6 rounded-lg shadow-md w-full">
        <h2 class="text-xl font-semibold mb-4">List of URLs</h2>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
            <tr class="bg-gray-50">
                <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                <th class="border border-gray-300 px-4 py-2 text-left">URL</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Frequency</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Last check</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Check count</th>
            </tr>
            </thead>
            <tbody>
            @forelse($urls as $index => $url)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $url->id }}</td>
                    <td class="border border-gray-300 px-4 py-2"><a class="text-blue-600" href="{{ $url->url }}" target="_blank">{{ $url->url }}</a></td>
                    <td class="border border-gray-300 px-4 py-2">{{ $url->frequency }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $url->last_checked_at?->format('Y-m-d H:i') ?? '--------------------' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $url->status->name }}</td>
                    <td class="border border-gray-300 px-4 py-2"><a href="{{ route('checks', ['url_id' => $url->id]) }}" class="text-blue-600">{{ $url->checks_count }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center border border-gray-300 px-4 py-2">No URLs Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $urls->links() }}
        </div>
    </div>
</div>
