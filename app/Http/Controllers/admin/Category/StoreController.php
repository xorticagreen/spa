<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Requests\Backend\Category\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Валідація форми та зберігання нової суттєвості (категорії) до бази даних
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request) //на підставі класу StoreRequest створюємо об'єкт $request та передаємо його у якості аргументу
    {
        $data = $request->validated(); // валідуємо дані з форми на підставі правил описаних в класі StoreRequest та розміщуємо в data
        $data['description'] = isset($data['description']) ? $data['description'] : strtolower($data['name']); //якщо в полі description пусто заповнюємо даними з поля name
        $data['is_published'] = isset($data['is_published']) ? true : false; //if isset->true, else->false
        $data['is_new'] = isset($data['is_new']) ? true : false; //if isset->true, else->false

        $this->service->store($data); //передаемо дані до сервісу, який збереже дані до бд

        return redirect()->route('admin.categories.index');
    }
}
