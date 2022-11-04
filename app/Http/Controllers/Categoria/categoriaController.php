<?php

namespace App\Http\Controllers\categoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorias;

class categoriaController extends Controller
{
   public function generarCategorias(Request $request){
     $categoria = new Categorias();
     $categoria->nombre = $request->nombre;
     $categoria->save();
     return response()-> json([
        "status" => 1,
        "mesagge" => "producto creado correctamente"
    ]);
   }

   public function getAllCategorias(){
      $categorias = Categorias::get();
      return response()-> json(
           $categorias
      );
   }
}
