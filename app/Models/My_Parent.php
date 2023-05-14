<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    use HasFactory;
    use HasTranslations ;

    public $translatable = ['Name_Father','Name_Mother','Job_Mother','Job_Father'];
    protected $table = 'my__parents' ;
    protected $guarded = [] ;
}
