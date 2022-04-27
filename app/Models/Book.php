<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    public function book_orders() {
    	return $this->belongsTo(BookOrder::class);
    }
    
    public function orders() {
    	return $this->belongsTo(Order::class);
    }
    
    public function users() {
    	return $this->belongsTo(User::class);
    }
/*    
    function getAll($orderBy, $orderType, $pagination) {
    	$books = null;
    	if(!isset($orderBy) || $orderBy == '') {
    		$orderBy = 'id';
    	}
    	if(!isset($orderType) || $orderType != "DESC") {
    		$orderType = 'ASC';
    	}
    	if(!isset($pagination) || $pagination <= 0) {
    		$pagination = 10;
    	}
    	$books = DB::table('books')->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $books;
    }
    
    function getById($id) {
    	$book = null;
    	if(!isset($id) || $id <= 0) {
    		return $book;
    	}
    	$book = DB::table('books')->find($id);
    	return $book;
    }
    
    function getBy($column, $type, $value, $orderBy, $orderType, $pagination) {
    	$books = null;
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
    	$books = DB::table('books')->where($column, $type, $value)->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $books;
    }
    
    function addOne($book) {
    	$id = DB::table('books')->insertGetId([
    		'code' 		=> $book->code,
    		'name' 		=> $book->name,
    		'quantity' 	=> $book->quantity,
    	]);
    	return $id;
    }
    
    function addMultiple($books) {
    	foreach ($books as $book)
    	{
    		DB::table('books')->insert([
    			'code' 		=> $book->code,
    			'name' 		=> $book->name,
    			'quantity' 	=> $book->quantity,
    		]);
    	}
    }
    
    function eidtOne($book) {
    	$row = DB::table('books')->where('id', $book->id)->update([
    		'code' 		=> $user->code,
    		'name' 		=> $user->name,
    		'quantity' 	=> $user->quantity,
    		'status' 	=> $user->status,
    	]);
    	return $row;
    }
    
    function eidtMultiple($books) {
    	foreach ($books as $book) {
    		DB::table('books')->where('id', $book->id)->update([
    			'code' 		=> $user->code,
    			'name' 		=> $user->name,
    			'quantity' 	=> $user->quantity,
    			'status' 	=> $user->status,
    		]);
    	}
    }
    
    function deleteOne($id) {
    	$row = DB::table('books')->where('id', $book->id)->delete();
    	return $row;
    }
    
    function deleteMultiple($ids) {
    	foreach ($ids as $id) {
    		DB::table('books')->where('id', $book->id)->delete();
    	}
    }
    */
}
