<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $auth_user = Auth::user();
        $title = 'Create New Category';
        $user_registrations = User::all()->count();
        return view('admin.Category.create', compact('user_registrations', 'title', 'auth_user'));

    }
}
