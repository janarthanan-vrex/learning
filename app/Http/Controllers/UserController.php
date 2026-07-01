<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
    $validator= Validator:: make($request->all(), [
        'email' => 'required|email|unique:users,email,' . $id,
        'name' => 'required'
    ]);
    if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'errors' => $validator->errors()
    ], 422);
}
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
