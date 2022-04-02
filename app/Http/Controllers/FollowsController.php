<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $authenticatedUser = Auth::user();
        return  $authenticatedUser->following()->toggle($user->profile);
    }
}
