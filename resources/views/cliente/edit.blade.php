@extends('layouts.app')
@section('content')
<a href="{{ route('cliente.index') }}">Back </a>
<form method="POST" action="{{ route('cliente.update',$cliente->id ) }}"  enctype="multipart/form-data">

    {{-- @method('PUT') --}}
    @csrf
     
        @method('PATCH')
    <label  >nombre:</label>
    <input type="text" name="nombre"  value="{{ $cliente->nombre }}"/>
    @error('nombre')
    <p style="color:red">{{$message}}</p>
    
    @enderror
    <input class="form-control" type="file" name="image" id="image" required>
    @if(isset($cliente->image))
    <img src="{{ asset('storage').'/'.$cliente->image }}" width="100px" height="70px">
    @endif
 
   
 



    <input type="submit" value="Update">
</form>
@endsection