<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class usuarioController extends Controller

{
    public function usuarioCreate(Request $request){
        $datacreate = new Usuarios();
        $datacreate->nombre = $request->nombre;
        $datacreate->contrasena = $request->contrasena;
        $datacreate->email =$request->email;
        $datacreate->localidad =$request->localidad;
        $datacreate->save();
        return response()-> json([
            "status" => 1,
            "mesagge" => "usuario-creado correctamente"
        ]);
    }
    public function usuarioDelete(Request $request){
        if(Usuarios::where("id",$request->id)->exists()){
            $datadelete = Usuarios::find($request->id);
            $datadelete -> delete();
            return response()-> json([
                "status" => 1,
                "mesagge" => "usuario-eliminado correctamente"
            ]);
        }else{

            return response()-> json([
                "status" => 1,
                "mesagge" => "data-not found succesfuly"
            ]);

        
    }
    }
    public function usuarioGet(){
        $dataresponse = Usuarios::get();
        return response()-> json([
            "status" => 1,
            "mesagge" => "usuario-conseguido  correctamente",
            "data" => $dataresponse
        ]);
    }

    

    public function usuarioLogin(Request $request)
    {
            
     if(Usuarios::where('nombre', $request->nombre)->exists() && Usuarios::where('contrasena', $request->contrasena)->exists()){
         return response()->json([
         'status' => true,
         'message' => 'User Logged In Successfully',
         ], 200);
    
        }


}
}
