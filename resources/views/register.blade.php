@extends('layout')

@section('content') 
<h1>Register new user </h1>  

<div class="col-sm-6">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<form method="post" action="/register">
@csrf 
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="add">Password </label>
    <input type="password" name="password" class="form-control" id="password" >
  </div>
  
  <div class="form-group">
    <label for="contact">Contact </label>
    <input type="text" name="contact" class="form-control" id="contact"  placeholder="Enter contact number">
  </div>
  

  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

@stop