<div class="flex justify-center mt-10">
    <div class="bg-black text-white p-4 shadow-md w-1/2 text-center rounded-md m-auto">
        <h1 class="text-3xl mb-4">Create new user</h1>
        <form wire:submit="create">
            {{ $this->form }}
            <button type="submit" class="w-full px-3 py-2 bg-white rounded-md mt-8 text-black">Create</button>
        </form>
    </div>
</div>
