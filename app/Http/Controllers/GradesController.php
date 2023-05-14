<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
  {
    $Grades = Grades::all();
    return view('pages.Grades.grades',compact('Grades'));
  }

  public function store(StoreGrades $request)
  {
    if(Grades::where('Name->ar',$request->Name)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return redirect()->back()->withErrors(trans('Grades_trans.Exists')) ;
    }

    try 
    {
        $validated = $request->validated();
        $Grade = new Grades();
        /*
        $translations = [
            'en' => $request->Name_en,
            'ar' => $request->Name
        ];
        $Grade->setTranslations('Name', $translations);
        */
        $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
        $Grade->Notes = $request->Notes;
        $Grade->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('grades.index');
    }

    catch (\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

   public function update(StoreGrades $request)
 {
    
   try
   {
    $validated = $request->validated();
    $Grades = Grades::findOrFail($request->id);
    $Grades->update
    ([
        $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Grades->Notes = $request->Notes,
    ]);
    toastr()->info(trans('messages.Update'));
    return redirect()->route('grades.index');
   }

   catch (\Exception $e) 
   {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

  public function destroy(Request $request)
  {
      $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

      if($MyClass_id->count() == 0)
      {
          $Grades = Grades::findOrFail($request->id)->delete();
          toastr()->error(trans('messages.Delete'));
          return redirect()->route('grades.index');
      }

      else
      {
        toastr()->error(trans('Grades_trans.delete_Grade_Error'));
        return redirect()->route('grades.index');
      }

  }
}
