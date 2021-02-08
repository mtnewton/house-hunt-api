<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {

        $input = $this->validate($request, [
            'email' => 'string|required',
            'password' => 'string|required',
        ]);

        $user = User::where('email', $input['email'])->first();

        if ($user && Hash::check($input['password'], $user->password)) {
            return [
                'api_token' => $user->api_token,
            ];
        }

        return response('Unauthorized.', 401);
    }
}
