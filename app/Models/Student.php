<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;

    use HasTranslations ; 

   public  $translatable = ['name'] ;

   protected $guarded =[];

   public function gender ()
   {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
   }

   public function grade ()
   {
        return $this->belongsTo('App\Models\Grades', 'Grade_id');
   }
   
   public function classroom ()
   {
        return $this->belongsTo('App\Models\ClassRoom', 'Classroom_id');
   }

   public function section ()
   {
        return $this->belongsTo('App\Models\sections', 'section_id');
   }
}
