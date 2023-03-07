<?php

namespace App\Http\Controllers\admin\Category;

use App\Models\Category;
//use App\Models\Product;

class DestroyController extends BaseController
{
    /**
     * Видаляемо за допомогою SoftDelete категорію, для всіх товарів category_id встановлюємо в NULL
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke()
    {
        //dd('111');
        $id = request()->id;
        $category = Category::find($id);
        //dd($category);
        //TODO::
        //$products = Product::where('category_id', $id)->get(); // змінюємо товари пов'язані з видаляємою категорією
        //dd($products);
//        foreach ($products as $product){ // змінюємо товари пов'язані з видаляємою категорією
//            $product->update([
//                'category_id' => NULL
//            ]);
//        }
        //TODO: get user id and add it to category name( example: deleted by John Doe)
        $category->update([
            'is_published' => '0',
        ]);

        $category->delete(); //use SoftDelete!

        return redirect(route('admin.categories.index'));
    }
}
