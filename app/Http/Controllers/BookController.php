<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
	public function showAll() {
    	$books = Book::all();
    	if(!isset($books)) return view('books', ['msg' => 'There is no data found.']);
    	return view('books', ['books' => $books]);
    }
    
    public function search(Request $request) {
    	$key 	= $request->key;
    	$books = Book::where('code', 'like', '%' . $key . '%')
    					->orWhere('name', 'like', '%' . $key . '%')
    					->get();
    	if(!isset($books)) return view('books', ['msg' => 'There is no data found.']);
    	return view('books', ['books' => $books]);
    }
	
    public function show(Request $request, $id) {
    	$book = Book::findOrFail($id);
    	if(!isset($book)) return view('book', ['msg' =>  'Book ' . $id . ' is not existed.']);
    	return view('editbook', ['book' => $book]);
    }
    
    public function add(Request $request) {
    	$book 			= new Book;
    	$book->code 	= $request->code;
    	$book->name 	= $request->name;
    	$book->save();
    	return $this->showAll();
    }
    
    public function edit(Request $request, $id) {
    	$book = Book::find($id);
    	if(!isset($book)) return view('books', ['msg' => 'Book ' . $id . ' is not existed.']);
    	$book->code 	= $request->code;
    	$book->name 	= $request->name;
    	$book->status	= $request->status;
    	$book->save();
    	return $this->showAll();
    }
    
    public function delete(Request $request, $id) {
    	$book = Book::find($id);
    	if(!isset($book)) return view('books', ['msg' =>  'Book ' . $id . ' is not existed.']);
    	$book->delete();
    	return $this->showAll();
    }
    
    public function orders($book_id) {
    	$book 	= Book::find($book_id);
    	$orders 	= $book->order();
    	return $orders;
    }
    
    public function users($book_id) {
    	$book	= Book::find($book_id);
    	$users 	= $book->user();
    	return $users;
    }
    
}
