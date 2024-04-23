<div>
    @if ($isOpen)
        <div class="fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
        </div>
        <div
            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-1/2 min-h-40 p-4 absolute">
            <button class="absolute ml-6 left-0" wire:click="$parent.closeModal()">X</button>
            <div class="bg-white p-4 shadow-md text-center rounded-ee-md m-auto">
                <h1 class="text-3xl">Update user information</h1>
                <div class="mt-4">
                    <x-alert />

                    <div class="flex justify-around">
                        <x-text-input name="form.name" label="Name" wire:model="form.name" placeholder="Fill name" />

                        <x-text-input name="form.email" label="Email" wire:model.live.debounce.2000ms="form.email"
                            placeholder="Fill Email" />

                        <x-text-input type="file" label="Avatar" name="form.avatar"
                            wire:model="form.avatar"></x-text-input>
                    </div>

                    <div class="mt-4">
                        <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                            wire:click="update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
