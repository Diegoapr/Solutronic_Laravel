@extends('layouts.app')
@section('content')











{{-- <a href="{{ route('cliente.index') }}">Back</a> --}}
{{-- en la accion va el nombre de la ruta a donde estamos enviando la informacion --}}
<form method="post" action="{{ route('cliente.store')}}" enctype="multipart/form-data">
    @csrf
<label for="">Nombre:</label>
<input type="text" name="nombre" > <br>
{{-- class="@error('nombre') danger @enderror" --}}
@error('nombre')
<p style="color:red">{{$message}}</p>

@enderror
 

<div class="col-md-4 mt-3">
    <label for="">Imagen</label>
    <input type="file" name="image" class="input-group-text">
</div>


 






<input type="submit">

</form>



@endsection