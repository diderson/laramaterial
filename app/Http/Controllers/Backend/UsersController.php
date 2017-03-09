<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    public function editPassword()
    {
        $this->validate(request(), [
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ]);

        $user = User::findOrFail(request('id'));

        $updated = $user->update([
            'password' => bcrypt(request('password'))
        ]);

        $response = [
            'status' => 'Error',
            'message' => 'Cannot update password'
        ];

        if ($updated) {
            $response = [
                'status' => 'OK',
                'message' => 'User password updated'
            ];
        }

        return response()->json($response);
    }
}