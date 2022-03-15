<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;



class RegistrationController extends Controller
{
    public function index(){

        return view('signup');
    }



    public function register(Request $req)
    {
        $req->validate(
            [
                'name'=> 'required',
                'email'=> 'required|email',
                'password'=> 'required'  
            ]   
        );
        // echo "<pre>";
        // print_r($request->input());
        $n = new users;
        $n->name=$req->name;
        $n->email=$req->email;
        $n->password=Hash::make($req->password);
        $n->save();
        $n=n::all();
        return redirect('home');
    }
}
