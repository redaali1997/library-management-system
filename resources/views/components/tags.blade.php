@props(['book'])

@php
$tags = explode(',', $book->tags);
@endphp
<div class="py-2">
    @foreach ($tags as $tag)
        <a href="/books/?tag={{ trim($tag) }}"
            class="rounded bg-gray-500 py-0.5 px-2 text-white">{{ trim($tag) }}</a>
    @endforeach
</div>
