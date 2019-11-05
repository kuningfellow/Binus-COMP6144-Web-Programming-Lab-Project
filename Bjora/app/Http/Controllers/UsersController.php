<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Bjora\User;

class UsersController extends Controller
{
    public function view() {
        $user = User::all();
        return view('profiles', ['user' => $user]);
    }
    public function addUser() {
        $user = ['role' => "admin"];
        return view('addUser', ['user' => $user]);
    }
    public function addUserADMIN() {
        $user = "";
        return view('addUserADMIN', ['user' => $user]);
    }
    public function updateUser(Request $request) {
        $user = User::find($request['user_id']);
        return view('updateUser', ['user' => $user]);
    }
    public function DBadd(Request $request) {
        $validatedData = $request->validate([ 
            'role' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'alpha_num', 'confirmed'],
            'gender' => ['required'],
            'address' => ['required'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'profile_picture' => ['required', 'mimes:jpeg,png,jpg'],
        ]);
        User::create([
            'role' => $request['role'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'address' => $request['address'],
            'date_of_birth' => $request['date_of_birth'],
            'profile_picture' => $request['profile_picture'],
        ]);
        return redirect('profiles')->with('success', 'User successfully added');
    }
    public function DBupdate(Request $request) {
        if ($request['role'] == NULL) $request['role'] = 'member';
        $validateData = $request->validate([
            'role' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['sometimes|required', 'min:6', 'alpha_num', 'confirmed'],
            'gender' => ['required'],
            'address' => ['required'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
        ]);
        $row = User::find($request['user_id']);
        if ($row != NULL) {
            if ($request['role']) $row->role = $request['role'];
            if ($request['name']) $row->name = $request['name'];
            if ($request['email']) $row->email = $request['email'];
            if ($request['password']) $row->password = Hash::make($request['password']);
            if ($request['gender']) $row->gender = $request['gender'];
            if ($request['address']) $row->address = $request['address'];
            if ($request['date_of_birth']) $row->date_of_birth = $request['date_of_birth'];
            if ($request['profile_picture']) $row->profile_picture = $request['profile_picture'];
            $row->save();
        }
        return redirect('profiles')->with('success', 'User successfully updated');
    }
}
