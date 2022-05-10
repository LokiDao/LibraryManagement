<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function user() {
    	return $this->belongsTo(User::class);
    }
    
    public function bookOrders() {
    	return $this->hasMany(BookOrder::class);
    }
    
    public function books() {
    	return $this->belongsToMany(Book::class);
    }
/*    
    public function getAll($orderBy, $orderType, $pagination) {
    	$orders = null;
    	if(!isset($orderBy) || $orderBy == '') {
    		$orderBy = 'id';
    	}
    	if(!isset($orderType) || $orderType != "DESC") {
    		$orderType = 'ASC';
    	}
    	if(!isset($pagination) || $pagination <= 0) {
    		$pagination = 10;
    	}
    	$books = DB::table('$orders')->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $books;
    }
    
    public function getById($id) {
    	$order = null;
    	if(!isset($id) || $id <= 0) {
    		return $order;
    	}
    	$book = DB::table('$orders')->find($id);
    	return $order;
    }
    
    public function getBy($column, $type, $value, $orderBy, $orderType, $pagination) {
    	$orders = null;
    	if(!isset($column) || $column == '') {
    		$column = 'code';
    	}
    	if ($type == 'LIKE') {
    		$value = '%' . $value . '%';
    	}
    	if(!isset($orderBy) || $orderBy == '') {
    		$orderBy = 'id';
    	}
    	if(!isset($orderType) || $orderType != "DESC") {
    		$orderType = 'ASC';
    	}
    	if(!isset($pagination) || $pagination <= 0) {
    		$pagination = 10;
    	}
    	$orders = DB::table('$orders')->where($column, $type, $value)->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $orders;
    }
    
    public function addOne($order) {
    	$id = DB::table('$orders')->insertGetId([
    		'code' 		=> $order->code,
    		'start' 	=> $order->start,
    		'end' 		=> $order->end,
    		'user_id' 	=> $order->user_id,
    		'book_id' 	=> $order->book_id,
    	]);
    	return $id;
    }
    
    public function addMultiple($books) {
    	foreach ($books as $book)
    	{
    		DB::table('books')->insert([
    				'code' 		=> $book->code,
    				'name' 		=> $book->name,
    				'quantity' 	=> $book->quantity,
    		]);
    	}
    }
    
    public function eidtOne($book) {
    	$row = DB::table('books')->where('id', $book->id)->update([
    			'code' 		=> $user->code,
    			'name' 		=> $user->name,
    			'quantity' 	=> $user->quantity,
    			'status' 	=> $user->status,
    	]);
    	return $row;
    }
    
    public function eidtMultiple($books) {
    	foreach ($books as $book) {
    		DB::table('books')->where('id', $book->id)->update([
    				'code' 		=> $user->code,
    				'name' 		=> $user->name,
    				'quantity' 	=> $user->quantity,
    				'status' 	=> $user->status,
    		]);
    	}
    	return $row;
    }
    
    public function deleteOne($id) {
    	$row = DB::table('books')->where('id', $book->id)->delete();
    	return $row;
    }
    
    public function deleteMultiple($ids) {
    	foreach ($ids as $id) {
    		DB::table('books')->where('id', $book->id)->delete();
    	}
    }
    */
}
