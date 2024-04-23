<div x-data="{ show: false }" x-on:open-modal.window="show=true" @keydown.escape.window="show=false">
    <div x-show="show">
        <div class="fixed inset-0 transform transition-all" @click="show=false">
            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
        </div>

        <div
            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-1/2 min-h-40 p-4 absolute">
            <p>Care about people's approval and you will be their prisoner.</p>

            <button @click="show=false" class="px-3 py-2 bg-white rounded-md shadow-md">Close</button>
        </div>
    </div>

</div>
