<x-layout>
    <div class="w-4/5">
        <a href="{{ route('books.index') }}"
            class="rounded bg-blue-500 py-1 px-3 text-xl font-semibold text-white">Browse Books</a>
        <div class="p-7 grid md:grid-cols-3 xs:grid-cols-1 gap-4">
            @forelse ($orders as $order)
                <x-book-cards :book="$order->book" />
            @empty
                <p class="text-center text-2xl font-semibold">No borrowed books yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>
