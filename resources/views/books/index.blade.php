<x-layout>
    <div class="w-4/5">
        <div class="p-7 grid md:grid-cols-3 xs:grid-cols-1 gap-4">
            @foreach ($books as $book)
                <x-book-cards :book="$book" />
            @endforeach
        </div>
        <div class=" flex justify-center">
            {{ $books->links() }}
        </div>
    </div>
</x-layout>
