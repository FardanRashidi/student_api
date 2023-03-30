<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function rules()
    {
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'name' => ['required'],
                'email' => ['required'],
                'address' => ['required'],
                'study_course' => ['required'],
            ];
        }else{
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'study_course' => ['sometimes', 'required'],
            ];
        }
       
    }
}
