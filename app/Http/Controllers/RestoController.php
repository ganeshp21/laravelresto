<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User; 
use Session; 

use Illuminate\Support\Facades\Crypt;

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
        'password' => 'nullable|required|max:15|min:3'
    ]); 

    $user = new User;  
    $user->name = $req->input('name');  
    $user->email = $req->input('email');  
    $user->password = Crypt::encryptString($req->input('password')); 
    $user->created_at = date('Y-m-d H:i:s');    
    $user->save();     
    $req->session()->flash('status','User registered successfully.');
    return redirect('register'); 


    }

    public function login(Request $req){  
        //return $req->input();  
        $user = User::where('email',$req->input('email'))->get();   
        //echo $user[0]->password; 
      //  echo Crypt::decryptString($user[0]->password); die();
        if(Crypt::decryptString($user[0]->password)== $req->input('password')){
            $req->session()->put('users',ucfirst($user[0]->name)); 
           return redirect('/');
           
        }
        
    }
}
