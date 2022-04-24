<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function order() {
    	return $this->hasMany(Order::class);
    }
    
    public function book() {
    	return $this->belongsToMany(Book::class);
    }
    
 /*   public function getAll($orderBy, $orderType, $pagination) {
    	$users = null;
    	if(!isset($orderBy) || $orderBy == '') {
    		$orderBy = 'id';
    	}
    	if(!isset($orderType) || $orderType != "DESC") {
    		$orderType = 'ASC';
    	}
    	if(!isset($pagination) || $pagination <= 0) {
    		$pagination = 10;
    	}
    	$users = DB::table('users')->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $users;
    }
    
    function getById($id) {
    	$user = null;
    	if(!isset($id) || $id <= 0) {
    		return $user;
    	}
    	$user = DB::table('$users')->find($id);
    	return $user;
    }
    
    function getBy($column, $type, $value, $orderBy, $orderType, $pagination) {
    	$users = null;
    	if(!isset($column) || $column == '') {
    		$column = 'email';
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
    	$books = DB::table('users')->where($column, $type, $value)->orderBy($orderBy, $orderType)->pagination($pagination);
    	return $users;
    }
    
    function addOne($user) {
    	$id = DB::table('users')->insertGetId([
    		'email' 	=> $user->email,
    		'name' 		=> $user->name,
    		'password' 	=> $user->password,
    		'role' 		=> $user->role,
    	]);
    	return $id;
    }
    
    function addMultiple($users) {
    	foreach ($users as $user)
    	{
	    	DB::table('users')->insert([
	    		'email' 	=> $user->email,
	    		'name' 		=> $user->name,
	    		'password' 	=> $user->password,
	    		'role' 		=> $user->role,
	    	]);
    	}
    }
    
    function eidtOne($user) {
    	$row = DB::table('users')->where('id', $user->id)->update([
    			'email' 	=> $user->email,
    			'name' 		=> $user->name,
    			'password' 	=> $user->password,
    			'role' 		=> $user->role,
    			'status' 	=> $user->status,
    	]);
    	return $row;
    }
    
    function eidtMultiple($users) {
    	foreach ($users as $user) {
	    	DB::table('users')->where('id', $user->id)->update([
    			'email' 	=> $user->email,
    			'name' 		=> $user->name,
    			'password' 	=> $user->password,
    			'role' 		=> $user->role,
	    		'status' 	=> $user->status,
	    	]);
    	}
    	return $row;
    }
    
    function deleteOne($id) {
    	$row = DB::table('users')->where('id', $user->id)->delete();
    	return $row;
    }
    
    function deleteMultiple($ids) {
    	foreach ($ids as $id) {
	    	DB::table('users')->where('id', $user->id)->delete();
    	}
    }
*/
}
