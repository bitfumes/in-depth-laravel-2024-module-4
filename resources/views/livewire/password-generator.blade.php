<div class="flex justify-center mt-10">
    <div class="bg-white p-4 shadow-md w-1/3 text-center rounded-ee-md m-auto">
        <h1 class="text-3xl">Password Generator</h1>
        <div class="mt-4">
            <button class="bg-black shadow-lg rounded-lg py-3 px-4 text-white w-44"
                wire:click="generatePassword">Generate</button>

            <p class="mt-10">{{ $password }}</p>
        </div>
    </div>
</div>
