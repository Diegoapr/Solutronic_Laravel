@extends('layouts.app')

@section('content')
    <a href="{{ route('cliente.create') }}">Crear Cliente nuevo</a>



<div class="table-responsive">
    <h1>clientes</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nombres y apellidos</th>
                <th>Imagen</th>

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>@if($clientes)
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>
                        <img src="{{ asset('storage').'/'.$cliente->image }}" alt="{{ $cliente->nombre }}" width="100px" height="70px">
                        {{-- <img src="{{ $cliente->image }}" alt="{{ $cliente->image }}" width="100px" height="70px"> --}}
                    </td>


                    <td>
                        <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        @if (Auth::user() && Auth::user()->id == 1)
                        <form method="POST" action="{{ route('cliente.eliminar', $cliente->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    @endif

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay datos</td>
                </tr>
            @endforelse
            @else
    <p>No hay clientes disponibles.</p>
@endif
        </tbody>
    </table>
</div>


@endsection



