@extends('layouts.app')
@section('content')
<a href="{{route('cliente.index')}}">Back</a>
<h6>{{$cliente->id}}</h6>
<h1>{{$cliente->nombre}}</h1>
<td><img src="{{ asset('storage').'/'.$cliente->image }}" width="200px" height="200px"></td>

@endsection