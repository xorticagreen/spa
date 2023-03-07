<?php

namespace App\Services\User;

use App\Models\User;

class Service
{
    public function store($data): void
    {
        $user = User::firstOrCreate(
            [
                'email' => $data['email'], //перевірка email на унікальність
            ], //масив заборони використання унікального значення (у данному випадку заброна створення с однаковим ім'ям)
            [
                'name' => $data['name'], //масив шаблон для зберігання
                'email' => $data['email'],
                'role' => 'customer',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]
        );
    }
    public function update($user, $data): void
    {
        $user->update(
            [
                'role' => $data['role'],
            ]
        );
    }
}
