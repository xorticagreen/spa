<?php

namespace App\Services\Category;

use App\Models\Category;

class Service
{
    public function store($data): void
    {

        //throw new \Exception('some message');

        // dd($data);

        $category = Category::firstOrCreate(
            [
                'name' => $data['name'], //перевірка імені на унікальність
            ], //масив заборони використання унікального значення (у данному випадку заброна створення с однаковим ім'ям)
            [
                'name' => strtoupper($data['name']), //масив шаблон для зберігання
                'description' => $data['description'],
                'is_published' => $data['is_published'],
                'is_new' => $data['is_new'],
                'sort_order' => $data['sort_order'],
            ]
        );

       // dd($category);

//        if ($category == null) {
//            throw new Exception('qwerty');
//        } else {
//            return $category;
//        }
    }
    public function update($category, $data): void
    {
        //$category->update($data); //валідовані дані
        $category->update([
            'name' => strtoupper($data['name']), //масив шаблон для зберігання
                'description' => $data['description'],
                'is_published' => $data['is_published'],
                'is_new' => $data['is_new'],
                'sort_order' => $data['sort_order'],
                ]
        ); //валідовані дані
    }
}
