<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Type_Blood;
use App\Repositories\Interfaces\StudentRepoInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student ; 

    public function __construct(StudentRepoInterface $Std)
    {
        return $this->student = $Std ;
    }
    
    public function index()
    {
        return $this->student->Get_Students() ;
    }

    public function create()
    {
        return $this->student->create_Student() ;
    }

    public function store(StoreStudent $request)
    {
        return $this->student->Store_Student($request) ;
    }

    public function show(Student $student)
    {
        //
    }

    public function edit($id)
    {
        return $this->student->Edit_Student($id) ;
    }

    public function update(StoreStudent $request)
    {
        return $this->student->Update_Student($request) ;
    }

    public function destroy(Request $request)
    {
        return $this->student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
       return  $this->student->Get_classrooms($id) ;
    }

    public function Get_Sections ($id)
    {
        return $this->student->Get_Sections($id) ;
    }
}
