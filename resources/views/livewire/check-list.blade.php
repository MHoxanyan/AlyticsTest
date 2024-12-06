<div class="container mx-auto pt-5 flex items-center w-4/6">
    <div wire:poll.5s class="bg-white p-6 rounded-lg shadow-md w-full">
        <h2 class="text-xl font-semibold mb-4">
            @if($url)
                Checks for URL <a class="text-blue-600" href='{{$url->url}}' target='_blank'>{{$url->url}}</a>
                @else
                All Checks
            @endif
        </h2>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
            <tr class="bg-gray-50">
                <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                <th class="border border-gray-300 px-4 py-2 text-left">URL</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status Code</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Response</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Attempt</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Checked At</th>
            </tr>
            </thead>
            <tbody>
            @forelse($checks as $index => $check)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $check->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ $check->url->url }}" target="_blank" class="text-blue-600">{{ $check->url->url }}</a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $check->status_code }}</td>
                    <td class="border border-gray-300 px-4 py-2 max-w-xs truncate" title="{{ $check->response }}">
                        {{ $check->response }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $check->attempt }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $check->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center border border-gray-300 px-4 py-2">No Checks Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $checks->links() }}
        </div>
    </div>
</div>
