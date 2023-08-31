<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blood_Type ;
use App\Models\Gender ;
use App\Models\Specialization ;
// use App\Models\User ;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([

            Blood_Seeder::class ,
            Nationality_Seeder::class ,
            Religion_Seeder::class ,
            Specialization_Seeder::class ,
            Gender_Seeder::class ,
            CreateAdminUserSeeder::class 
        ]) ;
    }
}
