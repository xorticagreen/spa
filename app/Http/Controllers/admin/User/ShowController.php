<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = ($request->id);
        $auth_user = Auth::user();
        $user_registrations = User::all()->count();
        $user = User::withTrashed()->find($id);
        return view('/admin/User/show', compact('user_registrations', 'auth_user', 'user'));
    }
}
