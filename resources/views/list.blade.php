
@extends('layout')
@section('content') 
<h4>Restaurant list page </h4>
@if(Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope='col'>Operation</th>
    </tr>
  </thead>
  <tbody>
@php 
$i=1 
@endphp
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->address}}</td>
      <td><a href="/delete/{{$item->id}}"><i class='fas fa-trash-alt' style='font-size:16px;color:red'></i></a></td>
    </tr>
   @php $i++ @endphp
    @endforeach
  </tbody>
</table>








@stop