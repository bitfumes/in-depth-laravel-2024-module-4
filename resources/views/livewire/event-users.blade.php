<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Event Users</h1>
        <div class="mt-4">
            <x-alert />
            <table class="border">
                <thead>
                    <tr class="grid grid-cols-4 gap-4 border p-2">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr key={{ $user->id }} class="grid grid-cols-4 gap-4 border">
                            <td class="p-2">
                                <a href="{{ route('event.user.show', $user->id) }}">{{ $user->id }}</a>
                            </td>
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td>
                                <button>Edit</button>
                                <button wire:click="delete({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete user?">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
