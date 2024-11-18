<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculos;

class vehiculossController extends Controller
{

    //funcion index para buscar todos los vehiculos
    public function index()
    {
        try {
            $vehiculos = vehiculos::all();
            return response()->json(['vehiculos' => $vehiculos], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los vehiculos: ' . $e->getMessage()], 500);
        }
    }

    //funcion para guardar un dato en la bd
    public function store(Request $request){
        try {
            // Crear una nueva instancia del modelo vehiculos
            $vehiculos = new vehiculos();
            $vehiculos->tipo = $request->tipo;
            $vehiculos->descripcion = $request->descripcion;
    
            // Guardar el vehiculos en la base de datos
            $vehiculos->save();
    
            // Devolver la respuesta con los datos del vehiculos creado
            return response()->json(['vehiculos' => $vehiculos], 201);
        } catch (\Exception $e) {
            // Manejo de excepciones, si algo falla durante el proceso de creación
            return response()->json(['error' => 'Error al guardar el vehiculos: ' . $e->getMessage()], 500);
        }
    }

    //funcion para buscar un solo registro
        public function show($id){
            try {
                $vehiculos = vehiculos::find($id);
        
                if ($vehiculos) {
                    return response()->json(['vehiculos' => $vehiculos], 200);
                } else {
                    return response()->json(['error' => 'Vehiculos no encontrado'], 404);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al obtener el vehiculos: ' . $e->getMessage()], 500);
            }   
        }

    //funcion para actualizar un solo dato
    public function update(Request $request, $id)
    {
        try {
        // Buscar el vehiculos por su ID
        $vehiculos = vehiculos::find($id);

        if ($vehiculos) {
            // Actualizar los datos del vehiculos
            $vehiculos->tipo = $request->tipo;
            $vehiculos->descripcion = $request->descripcion;

            // Guardar los cambios en la base de datos
            $vehiculos->save();

            // Devolver la respuesta con los datos del vehiculos actualizado
            return response()->json(['vehiculos' => $vehiculos], 200);
        } else {
            return response()->json(['error' => 'vehiculos no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar el vehiculos: ' . $e->getMessage()], 500);
    }

}

//funcion para eliminar un registro
public function destroy($id)
{
    try {
        // Buscar el vehiculos por su ID
        $vehiculos = vehiculos::find($id);

        if ($vehiculos) {
            // Eliminar el vehiculos de la base de datos
            $vehiculos->delete();

            // Devolver la respuesta con el mensaje de éxito
            return response()->json(['message' => 'vehiculos eliminado con éxito'], 200);
        } else {
            return response()->json(['error' => 'vehiculos no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al eliminar el vehiculos: ' . $e->getMessage()], 500);
    }
}

//funcion para guardar un dato en la bd con patch
public function patch(Request $request, $id)
{
    try {
        // Buscar el vehículo por su ID
        $vehiculos = Vehiculos::find($id);

        if ($vehiculos) {
            // Actualizar los datos del vehículo con los valores proporcionados en la solicitud
            if ($request->has('tipo')) {
                $vehiculos->tipo = $request->tipo;
            }
            if ($request->has('descripcion')) {
                $vehiculos->descripcion = $request->descripcion;
            }

            // Guardar los cambios en la base de datos
            $vehiculos->save();

            // Devolver la respuesta con los datos del vehículo actualizado
            return response()->json(['vehiculos' => $vehiculos], 200);
        } else {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar el vehículo: ' . $e->getMessage()], 500);
    }
}


}
