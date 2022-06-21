<x-layout>
    <div class="w-4/5">
        <div class="p-7 grid md:grid-cols-3 xs:grid-cols-1 gap-4">
            @forelse ($orders as $order)
                <x-book-cards :book="$order->book" />
            @empty
                <p class="text-center text-2xl font-semibold">No borrowed books yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>
