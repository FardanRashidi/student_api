<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentCollection;
use App\Services\StudentQuery;


class StudentController extends Controller
{

    //Display all
    public function index(StudentRequest $request){
        $filter = new StudentQuery();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new StudentCollection(Student::paginate());
        }else{
            return new StudentCollection(Student::where($queryItems)->paginate());
        }        
    }
    //Create a new Student
    public function store(StoreStudentRequest $request){
        return new StudentResource(Student::create($request->all()));
    }

    public function show(){
    }

    //Update
    public function update(UpdateStudentRequest $request, Student $student){
        $student->update($request->all());
    }

    //Delete
    public function destroy(Student $student){
        $student->delete();
    
        return response()->noContent();
        }
}
