<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Foto;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
  
    public function index(): View
    {
        $user = Auth::user();
    
        if ($user && $user->id == 1) {
            // Si el usuario es el administrador (id == 1), obtener todos los clientes y fotos
            $clientes = Cliente::all();
            $fotos = Foto::all();
        } else {
            // Si no es el administrador, obtener los clientes y fotos asociados al usuario
            $clientes = $user->clientes ?? collect();
            $fotos = $user->fotos ?? collect();
        }
    
        return view('cliente.index', compact('clientes', 'fotos'));
    }
    
    

    public function create(): view
    {
        return view('cliente.create');
    }
 

    public function store(ClienteRequest $request): RedirectResponse
    {
        // Obtén los datos del formulario excepto el token
        $data = $request->except('_token');
    
        // Agrega el user_id al array de datos
        $data['user_id'] = Auth::id();
    
        // Si se ha cargado una imagen, almacénala
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }
    
        // Crea el cliente
        Cliente::create($data);
    
        // Redirige con mensaje de éxito
        return redirect()->route('cliente.index')->with('success', 'Cliente creado exitosamente');
    }
    
    

    public function edit(Cliente $cliente)
    {

 
        return view('cliente.edit', compact('cliente'));
    }




     public function update(ClienteRequest $request, $id): RedirectResponse
     {
         // Validar que la nota existe
         $note = Cliente::findOrFail($id);
         // Validar que se haya cargado un archivo y que sea una imagen
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
             // Almacenar la imagen utilizando el método store
             $filename = $request->file('image')->store('uploads', 'public');
             $note->image = $filename;
         }
         // Actualizar la nota
         $note->update([
             'nombre' => $request->nombre,
             'categoria_id' => $request->categoria_id
         ]);
         return redirect()->route('cliente.index')->with('success', 'Nota editada');
     }







    public function show(Cliente $cliente): View
    {
        return view('cliente.show', compact('cliente'));
    }
    public function eliminar(Request $request, Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('cliente.index')->with('danger', 'cliente eliminada ');;
    }
}
