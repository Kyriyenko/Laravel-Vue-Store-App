<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $IsUniqueUserExists = User::where('name', '=', $request->name)->first();
        if ($IsUniqueUserExists) {
            return [
                'unique' => false,
                'message' => 'this name is already taken',
            ];
        }

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        $validator = Validator::make($user, [
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'errors' => $validator->messages()
            ];
        } else {
            $user = new  User([
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'role' => 'admin'
            ]);
            $user->save();
            Auth::login($user);
        }

        return [
            'status' => true,
            'message' => 'registration was successful',
            'role' => $user->role
        ];
    }

    public function getUserStatus()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return $user['role'];
        }
        return 'guest';
    }

    public function logoutUser()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return [
            'role' => 'guest',
            'status' => true
        ];
    }


    public function loginUser(Request $request)
    {
        $visitor = [
            'name' => $request->name,
            'password' => $request->password
        ];

        $validator = Validator::make($visitor, [
            'name' => 'required|string|max:50',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'braked',
                'errors' => $validator->messages()
            ];
        }
        $user = User::where('name', '=', $request->name)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
        } else {
            return [
                'status' => 'null',
                'message' => 'wrong email or password',
            ];
        }

        return [
            'status' => 'login',
            'message' => 'login was successful',
            'role' => $user->role
        ];
    }
}
