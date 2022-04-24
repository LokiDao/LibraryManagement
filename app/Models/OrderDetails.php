<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    
    public function order() {
    	return $this->belongsTo(Order::class);
    }
    
    public function book() {
    	return $this->belongsToMany(Book::class);
    }
    
    public function user() {
    	return $this->belongsToMany(User::class);
    }
}
