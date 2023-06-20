<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/oficinas.models.php');
$Oficinas = new OficinasModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Oficinas->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_empleado = $_POST['codigo_empleado'];    
            $datos = array();   
            $datos = $Oficinas->uno($codigo_empleado);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $codigo_oficina = $_POST['codigo_oficina'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            $region = $_POST['region'];
            $codigo_postal = $_POST['codigo_postal'];
            $telefono = $_POST['telefono'];
            $linea_direccion1 = $_POST['linea_direccion1'];
            $linea_direccion2 = $_POST['linea_direccion2'];
                        
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Oficinas->Insertar($codigo_oficina,$ciudad, $pais,$region, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $codigo_oficina = $_POST['codigo_oficina'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            $region = $_POST['region'];
            $codigo_postal = $_POST['codigo_postal'];
            $telefono = $_POST['telefono'];
            $linea_direccion1 = $_POST['linea_direccion1'];
            $linea_direccion2 = $_POST['linea_direccion2'];  

                $datos = array();        
                $datos = $Oficinas->Actualizar($codigo_oficina,$ciudad, $pais,$region, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $codigo_oficina = $_POST['codigo_oficina'];       
                $datos = array();        
                $datos = $Oficinas->Eliminar($codigo_oficina);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
