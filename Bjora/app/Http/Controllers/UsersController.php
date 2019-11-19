<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Bjora\User;

class UsersController extends Controller
{
    /*
        index()
        Returns a view of paginated users with admin controls
    */
    public function index() {
        // paginate all users
        $user = User::paginate(10);

        // returns view with pagination
        return view('users', ['users' => $user]);
    }

    /*
        view(Request $request)
        Returns a view of user_id profile page
    */
    public function view(Request $request) {
        // gets requested user data
        $user = User::find($request['user_id']);

        // returns user profile view with data
        return view('user', ['user' => $user]);
    }

    /*
        addUserADMIN()
        Returns a form view for adding users
    */
    public function addUserADMIN() {
        // returns form view for adding user
        return view('addUserADMIN', ['user' => NULL]);
    }

    /*
        updateUser(Request $request)
        Returns a form view for updating user user_id
    */
    public function updateUser(Request $request) {
        // gets requested user data
        $user = User::find($request['user_id']);

        // returns form view for updating user as another user
        return view('updateUser', ['user' => $user]);
    }

    /*
        updateUserADMIN(Request $request)
        Returns a form view for updating user user_id with 'role' promotion option
    */
    public function updateUserADMIN(Request $request) {
        // gets requested user data
        $user = User::find($request['user_id']);

        // returns form view for updating user as admin
        return view('updateUserADMIN', ['user' => $user]);
    }

    /*
        DBadd(Request $request)
        Validates and adds $request to 'users'
        Redirects to 'users' view
    */
    public function DBadd(Request $request) {
        // validates data
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

        // adds image to storage
        $storage = Storage::put('public', $request['profile_picture']);

        // adds data to 'users'
        User::create([
            'role' => $request['role'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'address' => $request['address'],
            'date_of_birth' => $request['date_of_birth'],
            'profile_picture' => Storage::url($storage),
        ]);

        // redirect with success
        return redirect('users')->with('success', 'User successfully added');
    }
    /*
        DBupdate(Request $request)
        Validates and updates $request on 'users'
        Redirects to 'users/user_id' (updated user's profile page)
    */
    public function DBupdate(Request $request) {
        $email_validate = [];
        $password_validate = [];
        $profile_picture_validate = [];

        // BAGIAN KREATIF

        // if password form is filled (user wants to change password)
        if ($request['password'] != NULL)   // comment this line to force password field
            $password_validate = ['required', 'min:6', 'alpha_num', 'confirmed'];
        // if email form was changed (need to check availability)
        if ($request['email'] != User::find($request['user_id'])->email)       // comment this line to force email field
            $email_validate = ['required', 'string', 'email', 'max:255', 'unique:users'];
        // if profile picture form was filled (need to check valid format)
        if ($request['profile_picture'] != NULL)                // comment this line to force profile picture
            $profile_picture_validate = ['required', 'mimes:jpeg,png,jpg'];

        // validates data
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

        // finds requested data entry
        $row = User::find($request['user_id']);

        // updates entry if found
        if ($row != NULL) {
            if ($request['role']) $row->role = $request['role'];
            if ($request['name']) $row->name = $request['name'];
            if ($request['email']) $row->email = $request['email'];
            if ($request['password']) $row->password = Hash::make($request['password']);
            if ($request['gender']) $row->gender = $request['gender'];
            if ($request['address']) $row->address = $request['address'];
            if ($request['date_of_birth']) $row->date_of_birth = $request['date_of_birth'];
            if ($request['profile_picture']) {
                $storage = Storage::put('public', $request['profile_picture']);
                $row->profile_picture = Storage::url($storage);
            }
            $row->save();
        }

        // redirects with success
        return redirect('users/' . $request['user_id'])->with('success', 'User successfully updated');
    }

    /*
        DBdelete(Request $request)
        Deletes $request on 'users'
        Redirects to 'users' view
    */
    public function DBdelete(Request $request) {
        // gets requested user entry
        $row = User::find($request['user_id']);

        // deletes entry if found
        if ($row != NULL) {
            $row->delete();
        }

        // redirects with success
        return redirect('users')->with('success', 'User successfully deleted');
    }
}
