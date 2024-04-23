<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Please fill the form</h1>
        <div class="mt-4">
            <x-alert />

            @foreach ($form->name as $key => $value)
                <div class="flex justify-around my-4">
                    <x-text-input name="form.name.{{ $key }}" label="Name"
                        wire:model="form.name.{{ $key }}" placeholder="Fill name" />

                    <x-text-input name="form.email.{{ $key }}" label="Email"
                        wire:model="form.email.{{ $key }}" placeholder="Fill Email" />
                </div>
            @endforeach

            <div x-data={count:0}>
                @if (count($form->name) > 1)
                    <button wire:click="remove" class="py-1 px-2 shadow-md border">-</button>
                @endif
                <p x-text="count"></p>
                <button x-on:click="count++" class="py-1 px-2 shadow-md border">+</button>
            </div>

            <div class="mt-4">
                <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                    wire:click="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
