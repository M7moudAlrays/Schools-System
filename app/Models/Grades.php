<?php

namespace App\Models ;

use Illuminate\Database\Eloquent\Factories\HasFactory ;
use Illuminate\Database\Eloquent\Model ; 
use Spatie\Translatable\HasTranslations ;

class Grades extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name'];

    
    protected $table = 'Grades';
    protected $fillable=['Name','Notes'];
    public $timestamps = true;


    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function Sections()
    {
        return $this->hasMany('App\Models\Sections', 'grade_id');
    }

}
