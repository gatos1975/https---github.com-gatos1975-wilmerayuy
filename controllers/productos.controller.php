<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/productos.models.php');
$Productos = new productosModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Productos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_producto = $_POST['codigo_producto'];    
            $datos = array();   
            $datos = $Productos->uno($codigo_producto);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $codigo_producto = $_POST['codigo_producto'];
            $nombre = $_POST['nombre'];
            $gama = $_POST['gama'];
            $dimensiones = $_POST['dimensiones'];
            $proveedor = $_POST['proveedor '];
            $descripcion = $_POST['descripcion'];
            $cantidad_en_stock = $_POST['cantidad_en_stock '];
            $precio_venta = $_POST['precio_venta'];
            $precio_proveedor = $_POST['precio_proveedor'];

            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Productos->Insertar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $codigo_producto = $_POST['codigo_producto'];
            $nombre = $_POST['nombre'];
            $gama = $_POST['gama'];
            $dimensiones = $_POST['dimensiones'];
            $proveedor = $_POST['proveedor '];
            $descripcion = $_POST['descripcion'];
            $cantidad_en_stock = $_POST['cantidad_en_stock '];
            $precio_venta = $_POST['precio_venta'];
            $precio_proveedor = $_POST['precio_proveedor']; 

                $datos = array();        
                $datos = $Productos->Actualizar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $codigo_producto = $_POST['codigo_producto'];       
                $datos = array();        
                $datos = $Productos->Eliminar($codigo_producto);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
