<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;

class productoController extends Controller
{
    public function productoCreate(Request $request){
        $datacreate = new Productos();
        $datacreate->nombre = $request->nombre;
        $datacreate->descripcion = $request->descripcion;
        $datacreate->categoria = $request->categoria;
        $datacreate->precio = $request->precio;
        $datacreate->stock = $request->stock;
        $datacreate->vendedor = $request->vendedor;
        $datacreate->save();
        return response()-> json([
            "status" => 1,
            "mesagge" => "producto creado correctamente"
        ]);
    }
    
    public function productoUpdate($id,Request $request){
        if(Productos::where("id",$id)->exists()){
        $data = Productos::find($id);
        $data->nombre = $request->nombre;
        $data->descripcion = $request->Descripcion;
        $data->categoria = $request->categoria;
        $data->precio= $request->Precio;
        $data->stock = $request->Stock;
        $data->save();
        return response()-> json([
            "status" => 1,
            "mesagge" => "producto actualizado correctamente"
        ]);
    }
    }
    public function productoDelete($id){
        if(Productos::where("id",$id)->exists()){
            $datadelete = Productos::find($id);
            $datadelete -> delete();
            return response()-> json([
                "status" => 1,
                "mesagge" => "producto eliminado correctamente"
            ]);
        }else{

            return response()-> json([
                "status" => 1,
                "mesagge" => "producto no encontrado"
            ]);

        
    }
    }
    public function productoGetAll(){
        $dataresponse = Productos::get();
        return response()-> json(
             $dataresponse
        );
    }
    public function productoGet($id){
        $dataresponse = Productos::find($id);
        return response()-> json(
            $dataresponse
        );
    }
    
   
    
    public function generarCategorias(Request $request){
        $categoria = new Categorias();
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()-> json([
           "status" => 1,
           "mesagge" => "categoria creado correctamente"
       ]);
      }
   
      public function getAllCategorias(){
         $categorias = Categorias::get();
         return response()-> json(
              $categorias
         );
      }

       public function restarStock($id,Request $request){ 
           $producto = Productos::find($id);
           $producto->Stock= $producto->Stock - intval($request->cantidadItems); 
           $out = new \Symfony\Component\Console\Output\ConsoleOutput();
           $out->writeln(gettype($request->cantidadItems));
           $out->writeln(intval($request->cantidadItems));
           $out->writeln($request);
           $producto->save();

           return response() -> json([
            
           ]);
           
          }
          public function verProductoVendedor($vendedor){
            if(Productos::where("vendedor",$vendedor)->exists()){
            $ven = Productos::find($vendedor); 
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln($vendedor);
            return response()-> json(
                 $ven
                     
            );
        }
    }
    }




