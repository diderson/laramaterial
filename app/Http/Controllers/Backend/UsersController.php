<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller  {

    public function index(){
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }
}