@extends('layout')

@section('content') 
<h1>User login </h1>  

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

<form method="post" action="/login">
@csrf 
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="add">Password </label>
    <input type="password" name="password" class="form-control" id="password" >
  </div>
  
  <button type="submit" class="btn btn-primary">login</button>
</form>
</div>

@stop