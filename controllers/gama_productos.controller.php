<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/gama_productos.model.php');
$gama_productos = new gama_productosModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $gama_productos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_pedido = $_POST['codigo_pedido'];    
            $codigo_producto = $_POST['codigo_producto'];
            $datos = array();   
            $datos = $gama_productos->uno($codigo_pedido, $codigo_producto);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $gama = $_POST['gama'];
            $descripcion_texto = $_POST['descripcion_texto'];
            $descripcion_html = $_POST['descripcion_html'];
            $imagen = $_POST['imagen'];
                        
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $gama_productos->Insertar($gama, $descripcion_texto, $descripcion_html, $imagen);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $gama = $_POST['gama'];
            $descripcion_texto = $_POST['descripcion_texto'];
            $descripcion_html = $_POST['descripcion_html'];
            $imagen = $_POST['imagen'];

                $datos = array();        
                $datos = $gama_productos->Actualizar($gama, $descripcion_texto, $descripcion_html, $imagen);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $gama = $_POST['gama'];                      
                $datos = array();        
                $datos = $gama_productos->Eliminar($gama);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
