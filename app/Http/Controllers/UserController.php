<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function userList(Request $request){
        $users = User::all();
        return view('user-list',compact('users'));

    }
    public function destroy(Request $request,$id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'success'=>true,
            'message'=>'user is deleted successfully'
        ],200);

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'email' => 'required|unique:email',
        'name' => 'required'
    ]);
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email
    ]);

    return response()->json([
        'success' => true,
        'message' => 'User updated successfully'
    ]);
}
}
