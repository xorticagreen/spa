<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\admin\User\BaseController;
use App\Http\Requests\Backend\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request)
    {
        /**
         * Валідація форми та збереження змін до бази даних
         */
        $id = $request->id;
        //dd($id);
        $data = $request->validated(); // валідовані дані
        //dd($data);
        //$data['description'] = isset($data['description']) ? $data['description'] : 'The description of ' . $data['name'] . ' is coming soon.';
        //dd($data);
        //$data['is_published'] = isset($data['is_published']) ? true : false ;
        //$data['is_new'] = isset($data['is_new']) ? true : false ;

        $user= User::find($id);
        $this->service->update($user, $data);

        return redirect(route('admin.users.index'));
    }
}
