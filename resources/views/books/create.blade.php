<x-layout>
    <div class="my-3 w-4/5 bg-slate-200 p-5 rounded-lg max-w-lg">
        @include('partials.error')
        <h2 class="text-2xl font-semibold">Add a Book</h2>
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Book Title"
                class="my-2 w-full rounded py-1 px-2 font-medium focus:outline-none" value="{{ old('title') }}"
                required />
            <textarea name="description" cols="30" class="my-2 w-full rounded py-1 px-2 font-medium focus:outline-none"
                placeholder="Book Description" value="{{ old('description') }}"></textarea>
            <input type="text" name="author" placeholder="Book Author"
                class="my-2 w-full rounded py-1 px-2 font-medium focus:outline-none" value="{{ old('author') }}"
                required />
            <input type="text" name="isbn" placeholder="Book ISBN"
                class="my-2 w-full rounded py-1 px-2 font-medium focus:outline-none" value="{{ old('isbn') }}"
                required />
            <div>
                <label class="font-semibold">Book Images: </label>
                <input type="file" name="images[]" multiple />
            </div>
            <input type="text" name="tags" placeholder="Tags(Comma Separated)"
                class="my-2 w-full rounded py-1 px-2 font-medium focus:outline-none" value="{{ old('tags') }}">
            <div class="w-full text-center">
                <button class="bg-blue-500 text-white py-1 w-full rounded my-2">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
