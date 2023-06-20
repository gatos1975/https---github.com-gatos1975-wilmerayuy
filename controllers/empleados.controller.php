<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/empleados.model.php');
$Empleados = new EmpleadoModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET

    case 'todos':
        $datos = array();
        $datos = $Empleados->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'uno':
            $codigo_empleado = $_POST['codigo_empleado'];    
            $datos = array();   
            $datos = $Empleados->uno($codigo_empleado);   
            $respuesta = mysqli_fetch_assoc($datos);   
            echo json_encode($respuesta);   
            break;
        case 'insertar':
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $extension = $_POST['extension'];
            $email = $_POST['email'];
            $codigo_oficina = $_POST['codigo_oficina'];
            $codigo_jefe = $_POST['codigo_jefe'];
            $puesto = $_POST['puesto'];
                        
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Empleados->Insertar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $extension = $_POST['extension'];
            $email = $_POST['email'];
            $codigo_oficina = $_POST['codigo_oficina'];
            $codigo_jefe = $_POST['codigo_jefe'];
            $puesto = $_POST['puesto'];  

                $datos = array();        
                $datos = $Empleados->Actualizar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);        
                //$respuesta = mysqli_fetch_assoc($datos);        
                echo json_encode($datos);        
                break;
        
        case 'eliminar':        
                $codigo_empleado = $_POST['codigo_empleado'];       
                $datos = array();        
                $datos = $Empleados->Eliminar($codigo_empleado);       
               //$respuesta = mysqli_fetch_assoc($datos);       
                echo json_encode($datos);       
                break;      
}
