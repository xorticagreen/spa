<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories'; //визначаємо до якої таблиці відноситься модель
    protected $guarded = false; //знімаємо обмеження на зміну

    public function products() : object // метод визначає відношення об'єкту створеного на основі цього класу до іньшого об'єкту
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
