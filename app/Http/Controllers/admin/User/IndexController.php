<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $auth_user = Auth::user();
        $title = 'Users';
        $user_registrations = User::all()->count();
        $users = User::withTrashed()->get();
        //dd($users);
        return view('/admin/User/index', compact('auth_user','title','user_registrations', 'users'));
    }
}
