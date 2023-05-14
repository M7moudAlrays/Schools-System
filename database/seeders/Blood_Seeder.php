<?php

namespace Database\Seeders;

use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blood_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type__bloods')->delete() ;

        $bloods = ['O-','O+','A-','A+','B-','B+','AB-','AB+'] ;


        foreach($bloods as $b)
        {
            Type_Blood::create(['Name'=>$b]) ;
        }
    }
}
