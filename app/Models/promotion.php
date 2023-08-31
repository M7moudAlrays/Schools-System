<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory ;
    
    protected $guarded=[] ;


    public function student()
    {
        return $this->belongsto('App\Models\Student', 'student_id');
    }

    public function f_grade() 
    {
        return $this->belongsto('App\Models\grades', 'from_grade');
    }

    public function f_classroom() 
    {
        return $this->belongsto('App\Models\classroom', 'from_Classroom');
    }

    public function f_section() 
    {
        return $this->belongsto('App\Models\sections', 'from_section');
    }

    public function t_grade() 
    {
        return $this->belongsto('App\Models\grades', 'to_grade');
    }

    public function t_classroom() 
    {
        return $this->belongsto('App\Models\classroom', 'to_Classroom');
    }

    public function t_section() 
    {
        return $this->belongsto('App\Models\sections', 'to_section');
    }
    
}
