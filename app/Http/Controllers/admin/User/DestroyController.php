<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\admin\Category\BaseController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//use App\Models\Product;

class DestroyController extends BaseController
{
    /**
     * Видаляемо за допомогою SoftDelete категорію, для всіх товарів category_id встановлюємо в NULL
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke()
    {
        $id = request()->id;
        $user = User::find($id);
//        $arr_methods_is = get_class_methods($user);
//        echo '<pre>';
//        print_r($arr_methods_is);
//        echo '</pre>';

//        dd($user);

        //TODO::
        //$products = Product::where('category_id', $id)->get(); // змінюємо товари пов'язані з видаляємою категорією
        //dd($products);
//        foreach ($products as $product){ // змінюємо товари пов'язані з видаляємою категорією
//            $product->update([
//                'category_id' => NULL
//            ]);
//        }
        //TODO: get user id and add it to link for more information( example: deleted by John Doe)
        $user->update([
            'role' => 'blocked',
        ]);

        $user->delete(); //use SoftDelete!

        return redirect(route('admin.users.index'));
    }
}
