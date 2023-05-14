<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return 
        [
            'Name' => 'required|unique:grades,name->ar'.$this->id , 
            'Name_en' => 'required|unique:grades,name->en,'.$this->id ,
            
            // unique:grades,name->en,'.$this->id,
        ];
    }

    
}
