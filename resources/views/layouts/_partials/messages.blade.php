 {{-- leer si la sesion pinta algun lenguaje --}}
@if($message = Session::get('success'))
<div style="padding:15px; background-color:green; color:aliceblue">
<p>{{$message}}</p>
</div>
@endif

{{-- leer si la sesion pinta algun lenguaje --}}
@if($message = Session::get('danger'))
<div style="padding:15px; background-color:rgb(231, 12, 12); color:aliceblue">
<p>{{$message}}</p>
</div>
@endif