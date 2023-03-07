<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $title = 'Create New User';
        $auth_user = Auth::user();
        $user_registrations = User::all()->count();
        return view('admin.User.create', compact('title','user_registrations', 'auth_user'));
    }
}
