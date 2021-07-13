<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index',compact('books'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

 
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'studname' =>  'required',
            'course' => 'required',
            'fee' => 'required'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success','Books created successfully.');
    }
    
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    
    public function update(Request $request, Book $book)
    {
        $request->validate([

        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success','Book updated successfully');
    }

    
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }
}
