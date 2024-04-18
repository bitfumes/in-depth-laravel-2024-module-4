<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/2 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Please fill the form</h1>
        <div class="mt-4">
            <div class="flex justify-around">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" class="w-44 py-2 px-4 border border-gray-300 rounded-lg"
                        wire:model="form.name" placeholder="Fill name" />
                    <div class="text-red-700 text-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" class="w-44 py-2 px-4 border border-gray-300 rounded-lg"
                        wire:model="form.email" placeholder="Fill email" />
                    <div class="text-red-700 text-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                    wire:click="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
