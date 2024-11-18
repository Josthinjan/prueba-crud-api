<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vehiculo;

class vehiculosController extends Controller
{

    //funcion index para buscar todos los vehiculo
    public function index()
    {
        try {
            $vehiculo = vehiculo::all();
            return response()->json(['vehiculo' => $vehiculo], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los vehiculo: ' . $e->getMessage()], 500);
        }
    }

    //funcion para guardar un dato en la bd
    public function store(Request $request){
        try {
            // Crear una nueva instancia del modelo vehiculo
            $vehiculo = new vehiculo();
            $vehiculo->tipo = $request->tipo;
            $vehiculo->descripcion = $request->descripcion;
    
            // Guardar el vehiculo en la base de datos
            $vehiculo->save();
    
            // Devolver la respuesta con los datos del vehiculo creado
            return response()->json(['vehiculo' => $vehiculo], 201);
        } catch (\Exception $e) {
            // Manejo de excepciones, si algo falla durante el proceso de creación
            return response()->json(['error' => 'Error al guardar el vehiculo: ' . $e->getMessage()], 500);
        }
    }

    //funcion para buscar un solo registro
        public function show($id){
            try {
                $vehiculo = vehiculo::find($id);
        
                if ($vehiculo) {
                    return response()->json(['vehiculo' => $vehiculo], 200);
                } else {
                    return response()->json(['error' => 'vehiculo no encontrado'], 404);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al obtener el vehiculo: ' . $e->getMessage()], 500);
            }   
        }

    //funcion para actualizar un solo dato
    public function update(Request $request, $id)
    {
        try {
        // Buscar el vehiculo por su ID
        $vehiculo = vehiculo::find($id);

        if ($vehiculo) {
            // Actualizar los datos del vehiculo
            $vehiculo->tipo = $request->tipo;
            $vehiculo->descripcion = $request->descripcion;

            // Guardar los cambios en la base de datos
            $vehiculo->save();

            // Devolver la respuesta con los datos del vehiculo actualizado
            return response()->json(['vehiculo' => $vehiculo], 200);
        } else {
            return response()->json(['error' => 'vehiculo no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar el vehiculo: ' . $e->getMessage()], 500);
    }

}

//funcion para eliminar un registro
public function destroy($id)
{
    try {
        // Buscar el vehiculo por su ID
        $vehiculo = vehiculo::find($id);

        if ($vehiculo) {
            // Eliminar el vehiculo de la base de datos
            $vehiculo->delete();

            // Devolver la respuesta con el mensaje de éxito
            return response()->json(['message' => 'vehiculo eliminado con éxito'], 200);
        } else {
            return response()->json(['error' => 'vehiculo no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al eliminar el vehiculo: ' . $e->getMessage()], 500);
    }
}

//funcion para guardar un dato en la bd con patch
public function patch(Request $request, $id)
{
    try {
        // Buscar el vehículo por su ID
        $vehiculo = vehiculo::find($id);

        if ($vehiculo) {
            // Actualizar los datos del vehículo con los valores proporcionados en la solicitud
            if ($request->has('tipo')) {
                $vehiculo->tipo = $request->tipo;
            }
            if ($request->has('descripcion')) {
                $vehiculo->descripcion = $request->descripcion;
            }

            // Guardar los cambios en la base de datos
            $vehiculo->save();

            // Devolver la respuesta con los datos del vehículo actualizado
            return response()->json(['vehiculo' => $vehiculo], 200);
        } else {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar el vehículo: ' . $e->getMessage()], 500);
    }
}


}
