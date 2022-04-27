<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function showAll() {
    	$users = User::all();
    	if(!isset($users)) return view('users', ['msg' => 'There is no data found.']);
    	return view('users', ['users' => $users]);
    }
    
    public function search(Request $request) {
    	$key 	= $request->key;
    	$users = User::where('email', 'like', '%' . $key . '%')
    					->orWhere('name', 'like', '%' . $key . '%')
    					->get();
    	if(!isset($users)) return view('users', ['msg' => 'There is no data found.']);
    	return view('users', ['users' => $users]);
    }
	
    public function show(Request $request, $id) {
    	$user = User::findOrFail($id);
    	if(!isset($user)) return view('users', ['msg' =>  'User ' . $id . ' is not existed.']);
    	return view('edituser', ['user' => $user]);
    }
    
    public function add(Request $request) {
    	$user 			= new User;
    	$user->email 	= $request->email;
    	$user->name 	= $request->name;
    	$user->password = Str::random(10);
    	//$user->email 	= Input::post('email');
    	//$user->name 	= Input::post('name');
    	$user->save();
    	return $this->showAll();
    }
    
    public function edit(Request $request, $id) {
    	$user = User::find($id);
    	if(!isset($user)) return view('users', ['msg' => 'User ' . $id . ' is not existed.']);
    	$user->email 	= $request->email;
    	$user->name 	= $request->name;
    	$user->password = $request->password;
    	$user->role		= $request->role;
    	$user->status	= $request->status;
    	$user->save();
    	return $this->showAll();
    }
    
    public function delete(Request $request, $id) {
    	$user = User::find($id);
    	if(!isset($user)) return view('users', ['msg' =>  'User ' . $id . ' is not existed.']);
    	$user->delete();
    	return $this->showAll();
    }
    
    public function orders($user_id) {
    	$user 	= User::find($user_id);
    	$orders = $user->order();
    	return $orders;
    }
    
    public function books($user_id) {
    	$user 	= User::find($user_id);
    	$books 	= $user->book();
    	return $books;
    }
}
