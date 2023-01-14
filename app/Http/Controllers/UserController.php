<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;



class UserController extends Controller
{
    public function index(){
        return 'hello from usercontroller';
    }

    public function login(){
        if(View::exists('user.login')){
            return view('user.login');
        }else{
            abort(404);
        }

    }

    public function register(){
        return view('user.register');
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

