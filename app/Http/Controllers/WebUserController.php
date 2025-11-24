<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\WebUser;

class WebUserController extends Controller
{
    public function create(Request $request)
    {
        // 1️⃣ Validate input
        $request->validate([
            'email' => 'required|email|unique:webusers,email',
            'password' => 'required',
        ]);

        // 2️⃣ Create user (timestamps handled automatically)
        $user = WebUser::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3️⃣ Generate API token using Sanctum
        $token = $user->createToken('API Token')->plainTextToken;

        // 4️⃣ Return JSON response
        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
