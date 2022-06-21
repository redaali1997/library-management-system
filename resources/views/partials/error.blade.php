@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="w-full bg-red-400 rounded text-white py-2 px-2 font-semibold">
            {{ $error }}
        </div>
    @endforeach
@endif
