<?php

namespace App\Repositories;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grades;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Sections;
use App\Models\Student;
use App\Models\Type_Blood;

use App\Repositories\Interfaces\StudentRepoInterface;
use Illuminate\Support\Facades\Hash;

class StudentRepo implements StudentRepoInterface
{

  public function Get_Students ()
  {
      $students = Student::all();
      return view ('pages.Students.index',compact('students')) ;
  }


  public function create_Student ()
  {
    $data['Genders'] = Gender::all() ;
    $data['nationals'] = Nationalitie::all() ;
    $data['bloods'] = Type_Blood::all() ;
    $data['grades'] = Grades::all() ;
    $data['parents'] = My_Parent::all();

    return view('Pages.Students.add' ,$data) ;
  }

  public function Get_classrooms($id)
  {
    return Classroom::where('grade_id' , $id)->pluck('Name_Class','id') ;
  }

  public function Get_Sections ($id) 
  {
    return Sections::where('class_id' , $id)->pluck('Name_Section','id') ;
  }

  public function Store_Student ($request)
  {
    try 
    {
      $student = new Student();
      $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
      $student->email = $request->email;
      $student->password = Hash::make($request->password);
      $student->gender_id = $request->gender_id;
      $student->nationalitie_id = $request->nationalitie_id;
      $student->blood_id = $request->blood_id;
      $student->Date_Birth = $request->Date_Birth;
      $student->Grade_id = $request->Grade_id;
      $student->Classroom_id = $request->Classroom_id;
      $student->section_id = $request->section_id;
      $student->parent_id = $request->parent_id;
      $student->academic_year = $request->academic_year;
      $student->save();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Students.create');
    }

    catch (\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function Edit_Student ($id) 
  {
    $data['Genders'] = Gender::all() ;
    $data['nationals'] = Nationalitie::all() ;
    $data['bloods'] = Type_Blood::all() ;
    $data['Grades'] = Grades::all() ;
    $data['parents'] = My_Parent::all();

    $Students = Student::findOrfail($id) ;
    return view('pages.students.edit' , $data  , compact ('Students') );
  }

  public function Update_Student ($request) 
  {
    try 
    {
      $student = Student::findOrfail($request->id) ;
      $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
      $student->email = $request->email;
      $student->password = Hash::make($request->password);
      $student->gender_id = $request->gender_id;
      $student->nationalitie_id = $request->nationalitie_id;
      $student->blood_id = $request->blood_id;
      $student->Date_Birth = $request->Date_Birth;
      $student->Grade_id = $request->Grade_id;
      $student->Classroom_id = $request->Classroom_id;
      $student->section_id = $request->section_id;
      $student->parent_id = $request->parent_id;
      $student->academic_year = $request->academic_year;
      $student->save() ;
      toastr()->success(trans('messages.Update'));
      return redirect()->route('Students.index');
    }

    catch (\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function Delete_Student ($request)
  {
    // Student::findOrfail($request->id)->delete() ;
    Student::destroy($request->id) ;
    toastr()->error(trans('messages.Delete')) ;
    return redirect()->route('Students.index') ;
  }

}




