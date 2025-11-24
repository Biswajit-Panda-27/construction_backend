<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\WebUser;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Find user by email
        $user = WebUser::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid Email'
            ], 404);
        }

        // 3. Check password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Incorrect Password'
            ], 401);
        }

        // 4. Generate API token
        $token = $user->createToken('API Token')->plainTextToken;

        // 5. Return response with token
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }
}
