<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => [
                'users' => $users
            ],
            'message' => 'users Fetched Successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'fname' => ['required', 'string', 'max:256'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string', 'max:256'],
            'password' => ['required', 'string', 'max:256'],
            'gender' => ['required', 'string', 'max:256'],
            'nationality' => ['required', 'string', 'max:256'],
            'number' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
             'major' => ['required', 'string', 'max:256']

        ]);
        User::query()->create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'number' => $request->input('number'),
            'location' => $request->input('location'),
            'major' => $request->input('major')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'success' => [
                'user' => $user
            ],
            'message' => 'user Fetched Successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'fname' => ['required', 'string', 'max:256'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string', 'max:256'],
            'password' => ['required', 'string', 'max:256'],
            'gender' => ['required', 'string', 'max:256'],
            'nationality' => ['required', 'string', 'max:256'],
            'number' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
            'major' => ['required', 'string', 'max:256']

        ]);
        $user ->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'number' => $request->input('number'),
            'location' => $request->input('location'),
            'major' => $request->input('major')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
