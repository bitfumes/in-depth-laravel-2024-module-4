<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Please fill the form</h1>
        <div class="mt-4">
            <div class="flex justify-around">
                <x-text-input name="form.name" label="Name" wire:model="form.name" placeholder="Fill name" />

                <x-text-input name="form.email" label="Email" wire:model.live.throttle.2000ms="form.email"
                    placeholder="Fill Email" />
            </div>

            <div class="mt-4">
                <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                    wire:click="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
