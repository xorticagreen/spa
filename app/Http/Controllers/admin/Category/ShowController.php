<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        //$category = Category::find($id);
        $category = Category::withTrashed()->find($id);

        return view('/admin/Category/show', compact('user_registrations', 'category', 'auth_user'));
    }
}
