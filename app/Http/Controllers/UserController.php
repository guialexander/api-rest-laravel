<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function pruebas(Request $request) {
        
        return "Accion de Pruebas de USER-CONTROLLER";
        
    }
    
    public function register(Request $request){
        
        // Recoger los datos del Usuario por post 
        $json = $request->input('json',null);
        $params = json_decode($json); // objeto
        $params_array = json_decode($json, true); // array
        if(!empty($params) && !empty($params_array)){
            // Limpiar Datos
                $params_array = array_map('trim', $params_array);

            // Validar datos 

            $validate = \Validator::make($params_array,[
                'name'      => 'required|alpha',
                'surname'   => 'required|alpha',
                'email'     => 'required|email|unique:users',
                'password'  => 'required',   

            ]);

            if($validate->fails()){
                //La Validación ha fallado
                $data= array(
                    'status'  => 'error',
                    'code'    =>  404,
                    'message' => 'El Usuario no se ha creado',   
                    'errors'  => $validate->errors(),
              );

            }else{
                // Validación pasa correctamente
                
                
                // Cifrar la contraseña 
                $pwd = password_hash($params->password,PASSWORD_BCRYPT, ['cost' => 4]);
                                
                // Crear el Usuario 
                $user = new User();
                $user->name = $params_array['name'];
                $user->surname = $params_array['surname'];
                $user->email = $params_array['email'];
                $user->password = $pwd;
                $user->role = 'ROLE_USER';
                
                // Guardar el Usuario
                $user->save();
               
                
                $data= array(
                    'status'  => 'succes',
                    'code'    =>  200,
                    'message' => 'El Usuario Se ha creado exitosamente!',  
                    'user' => $user

                    );           
                    }
        }else{
            
            $data= array(
                'status'  => 'error',
                'code'    =>  404,
                'message' => 'Los datos enviados no son correctos',   
                        );
            }
        
        
       
        
        
       
        
        
        return response()->json($data,$data['code']);
        
    }
    
    public function login(Request $request){
        
        return "Actición de Loguin de usuarios";
        
    }
    
    
}
