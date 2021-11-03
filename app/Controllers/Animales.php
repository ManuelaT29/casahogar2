<?php

namespace App\Controllers;

//se trae (importa) el modelo de datos 
use App\Models\AnimalModelo;


class Animales extends BaseController
{
    public function index()
    {
        return view('registroanimales');
    }
    public function registrar(){
        
        //1.recibbo todos los datos enviados desde el formulario
       
        //.lo que tengo entre getPost("") es el name que puse en registroproductos.php
    
        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");
        $foto=$this->request->getPost("foto");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipoAnimal");

       
        //2. Valido que llego
        if($this->validate('animales')){
            $datos=array(

            //3. se organizan los datos en un array
            //los naranjados  (claves) deben coincidir
            //con el nombre de las coloumnas de la BD 
                "nombre"=>$nombre,
                "edad"=>$edad,
                "foto"=>$foto,
                "descripcion"=>$descripcion,
                "tipo"=>$tipo
            );


         //4. intentamos grabar los datos en Bd
         try{

            $modelo = new AnimalModelo();
            $modelo->insert($datos);
            return redirect()->to(site_url('/animales/registro'))->with('mensaje',"Exito");

         }catch(\Exception $error){
             
            return redirect()->to(site_url('/animales/registro'))->with('mensaje',$error->getMessage());
         }


    } else{

        $mensaje ="tienes datos pendientes";
        return redirect()->to(site_url('/animales/registro'))->with('mensaje',$mensaje);

         // echo("Tienes datos pendientes");

        }
        
    }

    public function buscar(){
        try{

            $modelo = new AnimalModelo();
            $resultado= $modelo->findAll();
            $animales=array('animales'=>$resultado);
            return view('listaanimales',$animales);

           

        }catch(\Exception $error){
                 
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         

        }
    }

    public function eliminar($id){
        try{

            $modelo = new AnimalModelo();
            $modelo ->where('id',$id)->delete();
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',"Exito eliminando el producto");

        }catch(\Exception $error){
                 
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         

        }
    }

}
