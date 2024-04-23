@props(['title' => 'My title', 'name'])

<div x-data="{ show: false, id: null }"
    x-on:open-modal.window="show= ($event.detail.name === '{{ $name }}'); id=$event.detail.id"
    @keydown.escape.window="show=false" x-on:close-modal.window="show=false">
    <div x-show="show" style="display: none" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
        <div class="fixed inset-0 transform transition-all" @click="show=false">
            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
        </div>

        <div
            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-1/2 min-h-40 p-4 absolute">
            <h1 class="text-3xl underline-offset-4 mb-4">{{ $title }}</h1>
            {{ $slot }}
        </div>
    </div>
</div>
