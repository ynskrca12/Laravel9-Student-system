<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

       // $data = Students::all();

       $data = Students::where('id',101)->firstOrFail()-get();

        return view('students.index',['students' => $data]);
    }

    public function show($id){
        $data = Students::findOrFail($id);

        return view('students.index',['students' => $data]);
    }
}
