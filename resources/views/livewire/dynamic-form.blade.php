<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Please fill the form</h1>
        <div class="mt-4">
            <x-alert />

            @foreach (range(0, $count) as $value)
                <div class="flex justify-around my-4">
                    <x-text-input name="form.name.{{ $value }}" label="Name"
                        wire:model="form.name.{{ $value }}" placeholder="Fill name" />

                    <x-text-input name="form.email.{{ $value }}" label="Email"
                        wire:model="form.email.{{ $value }}" placeholder="Fill Email" />
                </div>

                @if ($count === $value)
                    <div>
                        @if ($count > 0)
                            <button wire:click="remove" class="py-1 px-2 shadow-md border">-</button>
                        @endif

                        <button wire:click="add" class="py-1 px-2 shadow-md border">+</button>
                    </div>
                @endif
            @endforeach

            <div class="mt-4">
                <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                    wire:click="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
