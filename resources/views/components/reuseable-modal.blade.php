@props(['title' => 'My title', 'name'])

<div x-data="{ show: false }" x-on:open-modal.window="show= ($event.detail.name === '{{ $name }}')"
    @keydown.escape.window="show=false">
    <div x-show="show">
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
