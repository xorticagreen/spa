<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function store($data){
        Product::firstOrCreate(
            [
                'name' => $data['name']
            ], //масив заборони використання унікального значення (у данному випадку заброна створення с однаковим ім'ям)
            [
                'name' => $data['name'], //масив шаблон для зберігання
                'description' => $data['description'],
                'is_published' => $data['is_published'], //is_published' => 0, - значення за умлвченням
                'is_new' => $data['is_new'],
                'sort_order' => $data['sort_order'],
                'category_id' => $data['category_id'],
                'price' => $data['price'],
            ]
        );
    }

    public function update($product, $data){
        $product->update($data); //передаемо дані до сервісу, який збереже дані до бд
    }
}
