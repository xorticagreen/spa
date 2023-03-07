<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __invoke()
    {


        //TODO:: get data from db and store that in view
        //$new_orders
        //$users_online

        $auth_user = Auth::user();
        //dd($user);
        $user_registrations = User::all()->count();
        return view('/admin/Main/index', compact('user_registrations', 'auth_user'));
    }
}
