<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/cliente.model.php');
$Clientes = new cliente; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Clientes->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_cliente = $_POST['codigo_cliente'];    
            $datos = array();   
            $datos = $Clientes->uno($codigo_cliente);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $nombre_cliente = $_POST['nombre_cliente'];
            $nombre_contacto = $_POST['nombre_contacto'];
            $apellido_contacto = $_POST['apellido_contacto'];
            $telefono = $_POST['telefono'];
            $fax = $_POST['fax'];
            $linea_direccion1 = $_POST['linea_direccion1'];
            $linea_direccion2 = $_POST['linea_direccion2'];
            $ciudad = $_POST['ciudad'];
            $region = $_POST['region'];
            $pais = $_POST['pais'];
            $codigo_postal = $_POST['codigo_postal'];
            $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
            $limite_credito = $_POST['limite_credito'];
            
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Clientes->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
                $codigo_cliente = $_POST['codigo_cliente'];    
                $nombre_cliente = $_POST['nombre_cliente'];
                $nombre_contacto = $_POST['nombre_contacto'];
                $apellido_contacto = $_POST['apellido_contacto'];
                $telefono = $_POST['telefono'];
                $fax = $_POST['fax'];
                $linea_direccion1 = $_POST['linea_direccion1'];
                $linea_direccion2 = $_POST['linea_direccion2'];
                $ciudad = $_POST['ciudad'];
                $region = $_POST['region'];
                $pais = $_POST['pais'];
                $codigo_postal = $_POST['codigo_postal'];
                $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
                $limite_credito = $_POST['limite_credito'];  

                $datos = array();        
                $datos = $Clientes->Actualizar($codigo_cliente, $nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $codigo_cliente = $_POST['codigo_cliente'];       
                $datos = array();        
                $datos = $Clientes->Eliminar($codigo_cliente);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
