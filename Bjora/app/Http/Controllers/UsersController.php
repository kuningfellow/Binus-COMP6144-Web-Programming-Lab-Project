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
        return view('addUser', ['user' => NULL]);
    }
    public function addUserADMIN() {
        return view('addUserADMIN', ['user' => NULL]);
    }
    public function updateUser(Request $request) {
        $user = User::find($request['user_id']);
        return view('updateUser', ['user' => $user]);
    }
    public function updateUserADMIN(Request $request) {
        $user = User::find($request['user_id']);
        return view('updateUserADMIN', ['user' => $user]);
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
        $email_validate = [];
        $password_validate = [];
        $profile_picture_validate = [];
        // if password form is filled (user wants to change password)
        if ($request['password'] != NULL) {
            $password_validate = ['required', 'min:6', 'alpha_num', 'confirmed'];
        }
        // if email form was changed (need to check availability)
        if ($request['email'] != User::find($request['user_id'])->email) {
            $email_validate = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }
        // if profile picture form was filled (need to check valid format)
        if ($request['profile_picture'] != NULL) {
            $profile_picture_validate = ['required', 'mimes:jpeg,png,jpg'];
        }
        $validateData = $request->validate([
            'role' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'email' => $email_validate,
            'password' => $password_validate,
            'gender' => ['required'],
            'address' => ['required'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'profile_picture' => $profile_picture_validate,
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
    public function DBdelete(Request $request) {
        $row = User::find($request['user_id']);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('profiles')->with('success', 'User successfully deleted');
    }
}
