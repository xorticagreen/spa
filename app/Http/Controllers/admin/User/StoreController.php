<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\admin\User\BaseController;
use App\Http\Requests\Backend\User\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Валідація форми та зберігання нової суттєвості (категорії) до бази даних
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request) //на підставі класу StoreRequest створюємо об'єкт $request та передаємо його у якості аргументу
    {
        $data = $request->validated(); // валідуємо дані з форми на підставі правил описаних в класі StoreRequest та розміщуємо в data

        //dd($data);
        $this->service->store($data); //передаемо дані до сервісу, який збереже дані до бд

        return redirect()->route('admin.users.index');
    }
}
