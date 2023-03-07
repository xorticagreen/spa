<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke() //(Request $request)
    {


        // dd('List of categories and add-category button');
        // return $request->method();
        // echo gettype($request);
        // dd($request);
        $auth_user = Auth::user();
        $title = 'Categories';
        $user_registrations = User::all()->count();

        //$categories = Category::all();
        $totalCountOfCategories = Category::withTrashed()->count();
        //dd($totalCountOfCategories);
        $categories = Category::withTrashed()->get();

        //dd(Category::withTrashed());
        //dd(Category::withTrashed()->get());

        return view('/admin/Category/index', compact('user_registrations','title', 'categories', 'totalCountOfCategories', 'auth_user'));
    }
}
