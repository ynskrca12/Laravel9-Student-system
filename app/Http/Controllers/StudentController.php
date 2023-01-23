<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $data = array("students" => DB::table('students')
        ->orderBy('created_at','desc')->simplePaginate(10));

        return view('students.index',$data);
    }

    public function show($id){
         $data = Students::findOrFail($id);
         return view('students.edit',['student' => $data]);
    }

    public function create(){
        return view('students.create')->with('title','Add New');
    }

    public function store(Request $request){
        $valited = $request->validate([
            "first_name" => ['required','min:4'],
            "last_name" => ['required','min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required','email',Rule::unique('students','email')],
        ]);

        Students::create($valited);

        return redirect('/')->with('message','New Student was added succuessfully!');
    }

    public function update(Request $request, Students $student){
        $valited = $request->validate([
            "first_name" => ['required','min:4'],
            "last_name" => ['required','min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required','email']
        ]);

        $student->update($valited);
        return back()->with('message','Data was successfully updated');
    }

    public function destroy(Request $request, Students $student){
        $student->delete();
        return redirect('/')->with('message','Data was successfully deleted');
    }
}
