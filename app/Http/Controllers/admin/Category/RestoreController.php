<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Request $request)
    {
        /**
         * Відновлює видалену категорію
         */
//        $id = request()->id;
//        dd($id);
        $category = Category::withTrashed()->find($request->id);
        $category->restore();
        return redirect( route('admin.categories.index'));
    }
}
