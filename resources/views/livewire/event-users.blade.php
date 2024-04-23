<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">

        @if ($isModalOpen)
            <livewire:edit-user-modal :isOpen="$isModalOpen" :user="$editUser" />
        @endif

        <x-reuseable-modal name="confirm" title="Are you sure ??">
            <p>User will get deleted permanently.</p>
            <div class="mt-10">
                <button class="px-3 py-2 rounded-md shadow-sm">Close</button>
                <button class="bg-gray-900 text-white px-3 py-2 rounded-md shadow-sm">Confirm</button>
            </div>
        </x-reuseable-modal>

        <h1 class="text-3xl">Event Users</h1>

        <x-text-input class="w-full" label="" placeholder="Search user by name or email" name="search"
            wire:model.live="search"></x-text-input>

        <div class="mt-4">
            <x-alert />
            <table class="border">
                <thead>
                    <tr class="grid grid-cols-4 gap-4 border p-2">
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr key={{ $user->id }} class="grid grid-cols-4 gap-4 border">
                            <td class="p-2 justify-center flex">

                                <a wire:navigate href="{{ route('event.user.show', $user->id) }}">
                                    <img class="rounded-full w-10 h-10" src="/storage/{{ $user->avatar }}"
                                        alt="">
                                </a>
                            </td>
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td>
                                <button wire:click="openModal({{ $user->id }})">Edit</button>
                                {{-- <button wire:click="delete({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete user?">Delete</button> --}}
                                <button x-on:click="$dispatch('open-modal',{name: 'confirm'})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
