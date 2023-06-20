<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/pagos.models.php');
$Pagos = new PagosModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Pagos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_cliente = $_POST['codigo_cliente'];    
            $id_transaccion = $_POST['id_transaccion'];
            $datos = array();   
            $datos = $Pagos->uno($codigo_cliente, $id_transaccion);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $codigo_cliente = $_POST['codigo_cliente'];
            $forma_pago = $_POST['forma_pago'];
            $id_transaccion = $_POST['id_transaccion'];
            $fecha_pago = $_POST['fecha_pago'];
            $total = $_POST['total'];
            
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Pagos->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $codigo_cliente = $_POST['codigo_cliente'];
            $forma_pago = $_POST['forma_pago'];
            $id_transaccion = $_POST['id_transaccion'];
            $fecha_pago = $_POST['fecha_pago'];
            $total = $_POST['total'];

                $datos = array();        
                $datos = $Pagos->Actualizar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $id_transaccion = $_POST['id_transaccion'];                          
                $datos = array();        
                $datos = $Pagos->Eliminar($id_transaccion);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
