<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin2',
                'last_name' => 'admin2Last',
                'email' => 'admin2@admin.com',
                'is_admin' => '1',
                'phone_no' => '54321777',
                'password' => bcrypt('12345678'),
                'enabled' => '1',
                'percent' => '0',
                'is_thai_admin' => '1',
                'is_super_admin' => '1',
            ],
            ];

            foreach($user as $key => $value) {
                User::create($value);
            }
    }
}
