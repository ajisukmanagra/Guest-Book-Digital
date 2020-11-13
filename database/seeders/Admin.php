<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt(12345),
            ],
        ];

        foreach ($admin as $key => $value) {
            User::create($value);
        }
    }
}
