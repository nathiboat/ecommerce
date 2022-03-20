<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\PrivateUserRescource;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
       
        $user = User::create($request->only('email', 'name', 'password'));

        return new PrivateUserRescource($user);

    }
}
