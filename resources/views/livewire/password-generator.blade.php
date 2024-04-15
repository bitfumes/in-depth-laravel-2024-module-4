<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/3 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Password Generator</h1>
        <div class="mt-4">
            <div>
                <label for="passwordLength">Password Length</label>
                <input type="number" class="w-44 py-2 px-4 border border-gray-300 rounded-lg" wire:model="length">
            </div>

            <div>
                <label for="characters">Characters</label>
                <input type="checkbox" wire:model="characters" id="characters">

                <label for="numbers">Numbers</label>
                <input type="checkbox" wire:model="numbers" id="numbers">
            </div>

            <div class="mt-4">
                <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white block w-full"
                    wire:click="generatePassword">Generate</button>
            </div>
            @if ($password)
                <p class="mt-10 bg-green-100 text-green-800 p-2 rounded-lg">{{ $password }}</p>
            @endif
        </div>
    </div>
</div>
