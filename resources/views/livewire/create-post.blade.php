<div>
    I am create post page
    @if (auth()->check())
        <p>My name is {{ $name }}</p>
    @endif
</div>
