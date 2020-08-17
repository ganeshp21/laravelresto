<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestoController extends Controller
{
    //   
    public function index(){
        return view('home');
    }

    public function list(){
        $data =  Restaurant::all();
        return view('list',['data'=>$data]);
    }  

    public function add(Request $req){ 
        $req->validate([
            'address'=>'required' , 
            'email'=>'required | email', 
            'name' =>'required'
        ]); 
    
        $resto = new Restaurant;  
        $resto->name = $req->input('name');  
        $resto->email = $req->input('email');  
        $resto->address = $req->input('address'); 
        $resto->save();     
        $req->session()->flash('status','Restaurant entered successfully.');
        return redirect('list'); 

    }
}
