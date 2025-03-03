<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// php artisan make:controller UserController

class UserController extends Controller
{
    //
    public function profile(User $user)
    {
        return view('user.profile', [
            'user' => $user
        ]);
    }
}
