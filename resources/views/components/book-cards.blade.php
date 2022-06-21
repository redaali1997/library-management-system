@props(['book'])

<div class="shadow-md rounded overflow-hidden">
    <img class="w-full h-24 object-cover"
        src="{{ $book->images ? '/storage/' . $book->images[0] : 'https://images.pexels.com/photos/4221068/pexels-photo-4221068.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' }}"
        alt="">
    <div class="p-4 text-center">
        <h3 class="font-semibold text-lg my-4">{{ $book->title }}</h3>
        <div class="flex justify-center flex-wrap">
            <x-tags :book="$book" />
        </div>
        <a href="{{ route('books.show', $book->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded">Book Details</a>
    </div>
</div>
