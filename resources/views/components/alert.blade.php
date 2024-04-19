@if (session('status'))
    <div class="p-2 text-green-800 bg-green-100">
        {{ session('status') }}
    </div>
@endif
