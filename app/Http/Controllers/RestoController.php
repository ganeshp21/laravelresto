<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User; 
use Session; 

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

    public function delete($id){  
        //echo $id;   
        Restaurant::find($id)->delete();   
         session::flash('status','Restaurant has been deleted successfully.');
         return redirect('list'); 

    }


    public function editview($id){ 
        $data = Restaurant::find($id); 
       return view('edit',['data'=>$data]);   
    }


    public function edit(Request $req){ 
        $req->validate([
            'address'=>'required' , 
            'email'=>'required | email', 
            'name' =>'required',
            'restoid'=>'required' 
        ]); 
    
        $resto = Restaurant::find($req->restoid);  
        $resto->name = $req->input('name');  
        $resto->email = $req->input('email');  
        $resto->address = $req->input('address'); 
        $resto->save();     
        $req->session()->flash('status','Restaurant update successfully.');
        return redirect('list'); 

    }


    public function register(Request $req){
       // return $req->input(); 
       $req->validate([
        'email'=>'required |unique:users| email', 
        'name' =>'required |string|max:200',
        'password' => 'nullable|required|max:15|min:6'
    ]); 

    $user = new User;  
    $user->name = $req->input('name');  
    $user->email = $req->input('email');  
    $user->password = md5($req->input('address')); 
    $user->created_at = date('Y-m-d H:i:s');    
    $user->save();     
    $req->session()->flash('status','User registered successfully.');
    return redirect('register'); 


    }
}
