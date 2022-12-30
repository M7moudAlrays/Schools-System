<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;
    public $translatable = ['Name_Class'];


    protected $table = 'Class_rooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_id'];


    // علاقة بين الصفوف والمراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grades', 'grade_id');
    }

}
















