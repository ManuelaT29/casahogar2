<?php

namespace App\Controllers;

//se trae (importa) el modelo de datos 
use App\Models\ProductoModelo;

class Productos extends BaseController
{
    public function index()
    {
        return view('registroproductos');
    }

    public function registrar(){
        
            //1.recibbo todos los datos enviados desde el formulario
           
            //.lo que tengo entre getPost("") es el name que puse en registroproductos.php
    
            $producto=$this->request->getPost("producto");
            $foto=$this->request->getPost("foto");
            $precio=$this->request->getPost("precio");
            $descripcion=$this->request->getPost("descripcion");
            $tipo=$this->request->getPost("tipoAnimal");
    
           
            //2. Valido que llego
            if($this->validate('producto')){
                $datos=array(

                //3. se organizan los datos en un array
                //los naranjados  (claves) deben coincidir
                //con el nombre de las coloumnas de la BD
                    "producto"=>$producto,
                    "foto"=>$foto,
                    "precio_unidad"=>$precio,
                    "descripcion"=>$descripcion,
                    "tipo"=>$tipo
                );
    
            //4. intentamos grabar los datos en Bd
             try{

                $modelo = new ProductoModelo();
                $modelo->insert($datos);
                return redirect()->to(site_url('/productos/registro'))->with('mensaje',"Exito agregando el producto");

             }catch(\Exception $error){
                 
                return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
             }


        } else{

            $mensaje ="tienes datos pendientes";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$mensaje);

             // echo("Tienes datos pendientes");

        }
      
    }

    public function buscar(){
        try{

            $modelo = new ProductoModelo();
            $resultado= $modelo->findAll();
            $productos=array('productos'=>$resultado);
            return view('listaproductos',$productos);

           

        }catch(\Exception $error){
                 
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         

        }
    }

    public function eliminar($id){
        try{

            $modelo = new ProductoModelo();
            $modelo ->where('id',$id)->delete();
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',"Exito eliminando el producto");

        }catch(\Exception $error){
                 
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         

        }
    }

    public function editar ($id){

        //Recibo datos
        $producto=$this->request->getPost("producto");
        $precio=$this->request->getPost("precio");

        //Validacion de datos
       
         //Organizo los datos en un arreglo asociativo
         $datos=array(
            'producto'=>$producto,
            'precio_unidad'=>$precio
        );

        // echo("Estamos editando el producto".$id);
        //print_r($datos);

        //crear un objeto del modelo
        try{

            $modelo = new ProductoModelo();
            $modelo->update($id,$datos);
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',"Exito editando el productos");

         }catch(\Exception $error){
             
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());
         }

           

    }
}
