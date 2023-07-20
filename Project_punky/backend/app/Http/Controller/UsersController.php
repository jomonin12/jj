<?php

namespace App\Http\Controller;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function getUsers(): Response
    {
        return response()->json(Users::all(), 200);
    }

    public function getUserByuId($id)
    {
        $user = Users::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }

        return response()->json(Users::find($id), 200);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = new Users([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // logg user
    public function loginUser(Request $request)
    {
        // $user = Users::create($request->all());

        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);

        // return ['message' => 'success'];
    }

    // update user
    public function updateUser(Request $request, $id)
    {
        $user = Users::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }
        $user->update($request->all());

        return response($user, 200);
    }

    // delete user
    public function deleteUser(Request $request, $id)
    {
        $user = Users::find($id);
        if (is_null($user)) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }
        $user->delete();

        return response(null, 204);
    }
}
