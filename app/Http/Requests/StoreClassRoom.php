<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRoom extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

   
    public function rules()
    {
        return
        [
            'List_Classes.*.Name' => 'required|unique:Class_rooms,Name_Class->ar,'.$this->id ,
            'List_Classes.*.Name_class_en' => 'required|unique:Class_rooms,Name_Class->en,'.$this->id ,
        ];
    }

    public function message()
    {
        return
        [
            'List_Classes.Name.required' => trans('validation.required') ,
        ];
    }
}

