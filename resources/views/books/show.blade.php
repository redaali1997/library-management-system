<x-layout>
    <div class="w-4/5">
        @if ($book->images)
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($book->images as $image)
                        <div class="carousel-item active">
                            <img src="/storage/{{ $image }}" class="d-block w-100 h-56 object-cover" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img class="h-56 w-full rounded object-cover"
                src="https://images.pexels.com/photos/4221068/pexels-photo-4221068.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="{{ $book->title }}" />
        @endif

        <h2 class="py-4 text-center text-4xl font-bold bg-slate-600 text-white">{{ $book->title }}</h2>
        <div class="flex justify-between py-4">
            <h4>Author: {{ $book->author }}</h4>
            <small>ISBN: {{ $book->isbn }}</small>
        </div>
        <x-tags :book="$book" />
        <div class="py-6">
            <h3 class="text-center text-lg font-semibold">Description</h3>
            <p class="text-center">{{ $book->description }}</p>
        </div>
        @auth
            @if (!auth()->user()->hasOrder($book->id))
                <form action="{{ route('order.create-order', $book->id) }}" method="post">
                    @csrf
                    <div class="w-full flex justify-center">
                        <button class="rounded bg-blue-500 py-1 w-1/2 text-2xl text-white text-center">Borrow</button>
                    </div>
                </form>
            @else
                @php
                    $order = $book
                        ->orders()
                        ->where('user_id', auth()->user()->id)
                        ->first();

                @endphp
                @if (!$order->confirmed)
                    <form action="{{ route('order.cancel-order', $book->id) }}" method="post">
                        @csrf
                        <div class="w-full flex justify-center">
                            <button class="rounded bg-red-500 py-1 w-1/2 text-2xl text-white text-center">Cancel</button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('order.reverse-order', $book->id) }}" method="post">
                        @csrf
                        <div class="w-full flex justify-center">
                            <button class="rounded bg-zinc-600 py-1 w-1/2 text-2xl text-white text-center">Reverse</button>
                        </div>
                    </form>
                @endif
            @endif
        @endauth
    </div>
</x-layout>
