<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grades;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grades::all();
        return view('pages.Classes.Classes', compact('My_Classes', 'Grades'));
    }

    
    public function create()
    {

    }

    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes;

        try {

            // $validated = $request->validated();
            foreach ($List_Classes as $List_Class) 
            {
                $My_Classes = new Classroom();
                $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];
                $My_Classes->Grade_id = $List_Class['Grade_id'];
                $My_Classes->save();
            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {

    }

    
    public function edit($id)
    {

    }

    
    public function update(Request $request , Classroom $class)
    {
        try 
        {
            $Classrooms = Classroom::findOrFail($request->id);

            $request->validate(
                [ 
                    'Name' => 'required|unique:class_rooms,Name_Class->ar'.$class->id,
                    'Name_en' => 'required|unique:class_rooms,Name_Class->en'.$class->id,
                ]) ;

                $Classrooms->update
                ([
                    $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                    $Classrooms->Grade_id = $request->Grade_id,
                ]);

                toastr()->success(trans('messages.Update'));
                return redirect()->route('Classrooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();

        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }


    public function delete_all(Request $request)
    {
        $ids = explode("," , $request->delete_all_id) ;
        Classroom::wherein("id" , $ids)->delete() ;
        
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {
        $Grades = Grades::all();
        $My_Classes = Classroom::select('*')->where('Grade_id', $request->Grade_id)->get();
        return view('pages.Classes.Classes',compact('Grades','My_Classes')) ;

        // return view('pages.Classes.Classes',compact('Grades'))->withDetails($My_Classes);
    }
} 