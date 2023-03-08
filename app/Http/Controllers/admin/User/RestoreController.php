<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Request $request)
    {
        /**
         * Відновлює видалену категорію
         */
        $user = User::withTrashed()->find($request->id);
        $user->update([
            'role' => 'customer',
        ]);
        $user->restore();
        return redirect( route('admin.users.index'));
    }
}
