<?php

namespace App\Http\Controllers\admin\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditController extends BaseController
{
    /**
     * Показує форму для редагування
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $auth_user = Auth::user();
        $title = 'Edit';
        $user_registrations = User::all()->count();
        $id = request()->id;
        $category = Category::find($id);
        return view('admin/Category/edit', compact('auth_user','title', 'user_registrations', 'category'));
    }
}
