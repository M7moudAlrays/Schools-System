<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSections;
use App\Models\Grades;
use App\Models\Classroom ;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades= Grades::with(['Sections'])->get() ;
        $list_Grades = Grades::all() ;
        // dd ($Grades) ;

        return view('pages.Sections.sections',compact('Grades','list_Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(StoreSections $request)
    
    {
     
        try 
        {
            $validated = $request->validated();
            $sections = new Sections() ;
            $sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $sections->grade_id = $request->Grade_id;
            $sections->class_id = $request->Class_id;
            $sections->Status = 1;
            $sections->save();
            // $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));

            return redirect()->route('Sections.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


  
  public function update(StoreSections $request)
  {

    try 
    {
      $validated = $request->validated();
      $Sections = Sections::findOrFail($request->id);

      $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
      $Sections->Grade_id = $request->Grade_id;
      $Sections->Class_id = $request->Class_id;

      if(isset($request->Status)) {
        $Sections->Status = 1;
      } else {
        $Sections->Status = 2;
      }


       // update pivot tABLE
        // if (isset($request->teacher_id)) {
        //     $Sections->teachers()->sync($request->teacher_id);
        // } else {
        //     $Sections->teachers()->sync(array());
        // }


      $Sections->save();
      toastr()->success(trans('messages.Update'));

      return redirect()->route('Sections.index');
    }

    catch (\Exception $e) 
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

    public function destroy(request $request)
    {
        Sections::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    }


    public function getclasses($id)
    {
        $listclasses = Classroom::where('grade_id', $id)->pluck('Name_Class','id') ;

        return $listclasses ;
    }
}
