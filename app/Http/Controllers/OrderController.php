<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;

class OrderController extends Controller
{
	public function showAll() {
    	$orders = Order::all();
    	if(!isset($orders)) return view('orders', ['msg' => 'There is no data found.']);
    	return view('orders', ['orders' => $orders]);
    }
    
    public function init() {
    	$users = User::all();
    	$books = Book::all();
    	return view('addorder', ['users' => $users, 'books' => $books]);
    }
    
    public function search(Request $request) {
    	$key 	= $request->key;
    	$orders = Order::where('code', 'like', '%' . $key . '%')
    					->orWhere('user_email', 'like', '%' . $key . '%')
    					->orWhere('book_code', 'like', '%' . $key . '%')
    					->get();
    	if(!isset($orders)) return view('orders', ['msg' => 'There is no data found.']);
    	return view('orders', ['orders' => $orders]);
    }
	
    public function show(Request $request, $id) {
    	$order = Order::findOrFail($id);
    	$users = User::all();
    	$books = Book::all();
    	if(!isset($order)) return view('order', ['msg' =>  'Order ' . $id . ' is not existed.']);
    	return view('editorder', ['order' => $order, 'users' => $users, 'books' => $books]);
    }
    
    public function add(Request $request) {
    	$order 			= new Order;
    	$orders->code 	= $request->code;
    	$orders->user   = $request->user;
    	$order->start 	= $request->start;
    	$order->end 	= $request->end;
    	$orders->book	 = $request->books;
    	$book->save();
    	return $this->showAll();
    }
    
    public function edit(Request $request, $id) {
    	$order = Order::find($id);
    	if(!isset($order)) return view('order', ['msg' => 'Order ' . $id . ' is not existed.']);
    	$order->code 	= $request->code;
    	$order->user 	= $request->user;
    	$order->start 	= $request->start;
    	$order->end 	= $request->end;
    	$order->book 	= $request->books;
    	$order->status	= $request->status;
    	$order->save();
    	return $this->showAll();
    }
    
    public function delete(Request $request, $id) {
    	$order = Order::find($id);
    	if(!isset($order)) return view('order', ['msg' =>  'Order ' . $id . ' is not existed.']);
    	$order->delete();
    	return $this->showAll();
    }
}
