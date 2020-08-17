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
}
