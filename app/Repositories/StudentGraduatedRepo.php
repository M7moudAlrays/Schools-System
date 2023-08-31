<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Grades;

use App\Repositories\Interfaces\StudentGraduatedinterface;

class StudentGraduatedRepo implements StudentGraduatedinterface
{
    public function index()
    {
         // $students = Student::all() ;

        $students = Student::onlyTrashed()->get() ;
        return view('pages.Students.Graduated.index' , compact ('students')) ;                
    }


    public function create()
    {
        $Grades = Grades::all() ;
        return view('pages.Students.Graduated.create' , compact ('Grades')) ;                
    }

    public function softDelete($req)
    {
        $students = Student::where('Grade_id' , $req->Grade_id)->where('Classroom_id',$req->Classroom_id)->where('section_id', $req->section_id)->get() ;
        
        if($students->count() < 1 )
        {
            return 'There is no Strudents' ;
        }

        else
        {
            foreach($students as $stud)
            {
                $ids = explode(',' , $stud->id) ;
                Student::whereIn('id',$ids)->Delete() ;  
            }
            toastr()->success(trans('messages.Delete')) ;
            return redirect()->route('Graduated.index') ;
        }
    }

    public function returnStudent($req) 
    {
        Student::onlyTrashed()->where('id' ,$req->id)->first()->restore() ;
        toastr()->success(trans('messages.Return')) ;
        return redirect()->back() ;
    }

    public function deleteStudent ($req) 
    {
        Student::onlyTrashed()->where('id' ,$req->id)->first()->forceDelete() ;
        toastr()->success(trans('messages.Delete')) ;
        return redirect()->back() ;
    }

}
