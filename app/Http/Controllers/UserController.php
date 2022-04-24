<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function showAll() {
    	$users = User::all();
    	return view('users', ['users' => $users]);
    }
	
    function show(Request $request, $id) {
    	$user = User::findOrFail($id);
    	return view('eidtuser', [
    			'id' 	=> $user->id, 
    			'email' => $user->email,
    			'name' 	=> $user->name,
    			'role'	=> $user->role
    	]);
    }
    
}
