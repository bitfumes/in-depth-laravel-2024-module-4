@props(['name', 'label'])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input {!! $attributes->merge([
        'class' => 'w-44 py-2 px-4 border border-gray-300 rounded-lg',
    ]) !!}>

    <div class="text-red-700 text-sm">
        @error($name)
            {{ $message }}
        @enderror
    </div>
</div>
