<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/pedido.model.php');
$Pedido = new pedido; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Pedido->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_pedido = $_POST['codigo_pedido'];    
            $datos = array();   
            $datos = $Pedido->uno($codigo_pedido);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $fecha_pedido = $_POST['fecha_pedido'];
            $fecha_esperada = $_POST['fecha_esperada'];
            $fecha_entrega = $_POST['fecha_entrega'];
            $estado = $_POST['estado'];
            $comentarios = $_POST['comentarios'];
            $codigo_cliente = $_POST['codigo_cliente'];
                                    
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Pedido->Insertar($fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $fecha_pedido = $_POST['fecha_pedido'];
            $fecha_esperada = $_POST['fecha_esperada'];
            $fecha_entrega = $_POST['fecha_entrega'];
            $estado = $_POST['estado'];
            $comentarios = $_POST['comentarios'];
            $codigo_cliente = $_POST['codigo_cliente'];  

                $datos = array();        
                $datos = $Pedido->Actualizar($fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $codigo_cliente = $_POST['codigo_cliente'];       
                $datos = array();        
                $datos = $Pedido->Eliminar($codigo_cliente);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
