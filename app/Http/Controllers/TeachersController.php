<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacher;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repositories\Interfaces\TeacherRepoInterface;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepoInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers() ;
        // $Teachers = Teacher::All() ;
        return view ('Pages.Teachers.Teachers',compact('Teachers')) ;
    }

    public function create()
    {
        // $specializations =Specialization::all() ;
        // $genders= Gender::all() ;

        $specializations = $this->Teacher->getSpeciaizations();
        $genders = $this->Teacher->getGenders();

        return view('Pages.Teachers.create',compact('specializations','genders')) ;
    }

    public function store(StoreTeacher $request)
    {
      return $this->Teacher->StoreTeachers($request);
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit($id)
    {
        $specializations = $this->Teacher->getSpeciaizations();
        $genders = $this->Teacher->getGenders();
        $Teachers =$this->Teacher->editTeachers($id);
        return view ('Pages.Teachers.Edit',compact('specializations','genders','Teachers')) ;
    }

    public function update(StoreTeacher $request)
    {
        return $this->Teacher->updateTeachers($request) ;
    }

    public function destroy(Request $request)
    {
        return $this->Teacher->deleteTeachers($request) ;
    }
}
