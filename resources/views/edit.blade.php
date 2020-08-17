@extends('layout')


@section('content')  
<h1>Edit Restaurant Details  </h1>  



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

<form method="post" action="/edit">
@csrf 
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}"  placeholder="Enter name">
  </div>
  
  <div class="form-group">
    <label for="add">Address </label>
    <input type="text" name="address" class="form-control" id="address" value="{{$data->address}}"  placeholder="Enter address">
  </div>
  
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" value="{{$data->email}}"  placeholder="Enter email">
  </div>
  
<input type='hidden' name='restoid' id='restoid' value='{{$data->id}}'> 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@stop  