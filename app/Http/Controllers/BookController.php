<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        };

        if ($request->tag) {
            $books = Book::filter($request->tag)->orderBy('id', 'desc')->paginate(6);
            $books->appends(['tag' => $request->tag]);
        } else {
            $books = Book::orderBy('id', 'desc')->paginate(6);
        }
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn',
        ]);

        //Store multiple images
        $path = [];
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $path[] = $image->storeAs('images', $image->getClientOriginalName(), 'public');
            }
        }
        $new_book = [
            'title' => [
                'en' => $validated['title'],
                'ar' => $request->input('ar-title'),
            ],
            'description' => [
                'en' => $validated['description'],
                'ar' => $request->input('ar-description')
            ],
            'author' => $validated['author'],
            'isbn' => $validated['isbn'],
            'images' => $path,
            'tags' => $request->tags
        ];
        // Create a new book
        auth()->user()->books()->create($new_book);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        };
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
