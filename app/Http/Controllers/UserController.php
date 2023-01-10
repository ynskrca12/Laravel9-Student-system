<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return 'hello from usercontroller';
    }

    public function show($id){
        $data = array(
            "id" => $id,
            "name" => "Pinoy",
            "age" => "22",
            "email" => "pinoy@gmail.com"
        );
        return view('user', $data);
    }
}

