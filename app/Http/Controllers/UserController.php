<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserDetail::all();
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
            'lname' => ['required', 'string', 'max:256'],
            'email' => ['required', 'string', 'max:256', 'email'],
            'password' => ['required', 'string', 'max:256'],
            'gender' => ['required', 'string', 'max:256'],
            'number' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
            'major' => ['required', 'string', 'max:256'],
            'role' => ['required', 'string', 'max:256']
        ]);

        UserDetail::query()->create([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'),
            'number' => $request->input('number'),
            'location' => $request->input('location'),
            'major' => $request->input('major'),
            'role' => $request->input('role')
        ]);

        return response()->json([
            'success' => [
                'user' => ['Created']
            ],
            'message' => 'User Created Successfully'
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
        try {
            $request->validate([
                'fname' => ['string', 'max:256'],
                'lname' => ['string', 'max:256'],
                'email' => ['string', 'max:256'],
                'password' => [ 'string', 'max:256'],
                'gender' =>  ['string', 'max:256'],
                'number' => [ 'string', 'max:256'],
                'location' => [ 'string', 'max:256'],
                'major' => [ 'string', 'max:256'],
                'role' => ['string', 'max:256']
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'error' => [
                    $exception->errors()
                ],
                'message' => $exception->getMessage()
            ]);
        }

        $user->update([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'gender' => $request->input('gender'),
            'number' => $request->input('number'),
            'location' => $request->input('location'),
            'major' => $request->input('major'),
            'role' => $request->input('role')
        ]);

        return response()->json([
            'success' => [
                'user' => ['Updated']
            ],
            'message' => 'User Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->detail->detach();
        $user->delete();
    }
}
