<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{

    public function index($type = null)
    {
        $users = User::query();

        switch ($type) {
            case 'deactivated':
                $users->where('active', false);
                break;
            case 'deleted':
                $users = $users->onlyTrashed();
                break;
        }

        $users = $users->get();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|max:255'
        ]);
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