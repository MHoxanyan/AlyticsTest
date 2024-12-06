
    <div class="container mx-auto pt-5 flex items-center w-4/6">
        <div class="p-8 bg-white rounded-lg shadow-md w-full">
            <form wire:submit.prevent="save">
                <div class="mb-6">
                    <label for="url" class="block text-lg font-medium text-gray-700">URL</label>
                    <input type="text" id="url" wire:model="url" name="url"
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-base p-3" />
                    @error('url') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="frequency" class="block text-lg font-medium text-gray-700">Frequency</label>
                    <input type="number" id="frequency" wire:model="frequency" name="frequency"
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-base p-3" />
                    @error('frequency') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="retry" class="block text-lg font-medium text-gray-700">Retry</label>
                    <input type="number" id="retry" wire:model="retry" name="retry"
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-base p-3" />
                    @error('retry') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="retry_frequency" class="block text-lg font-medium text-gray-700">Retry Frequency</label>
                    <input type="number" id="retry_frequency" wire:model="retry_frequency"  name="retry_frequency"
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-base p-3" />
                    @error('retry_frequency') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit"
                            class="w-full inline-flex justify-center rounded-lg border border-transparent bg-indigo-600 px-6 py-3 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </form>
        </div>

    </div>
