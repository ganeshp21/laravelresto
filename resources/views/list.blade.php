
@extends('layout')
@section('content') 
<h4>Restaurant list page </h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
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
    </tr>
   @php $i++ @endphp
    @endforeach
  </tbody>
</table>








@stop