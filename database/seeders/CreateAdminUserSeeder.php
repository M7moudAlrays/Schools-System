<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = user::create(
            [
            'name' => 'Mahmoud',
            'email' => 'Mahmoud@yahoo.com',
            'password' => bcrypt('12345'),
            ]);
    }
}
