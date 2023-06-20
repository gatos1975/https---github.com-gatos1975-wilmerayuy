<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/roles.model.php');
$Roles = new RolesModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
/*
case 'login': // Cao 1: Login
    $correo = $_POST['correo']; //TODO: Declaccion de variable para obtener datos tipo POST
    $contrasenia = $_POST['contrasenia'];
    if (empty($correo) or empty($contrasenia)) {  //TODO:Validacion de variables
        header("Location:../index.php?op=2"); //TODO:redirecionamiento a pagina index
        exit(); //TODO:fin de ejecucion de codigo
    }
    $datos = array();
    $datos = $Usuario->login($correo, $contrasenia);
    $res = mysqli_fetch_assoc($datos);
    try {
        if (is_array($res) and count($res) > 0) {
            //$_SESSION['idUsuario'] = $res['idUsaurio'];
            //$_SESSION['Nombres'] = $res['Nombres'];
            //$_SESSION['Apellidos'] = $res['Apellidos'];
            //$_SESSION['correo'] = $res['correo'];
            $_SESSION['idRoles'] = $res['idRoles'];
            $_SESSION['Detalle'] = $res['Detalle'];
            header('Location:../views/Dashboard/');
            exit();
        } else {
            header("Location:../index.php?op=1");
            exit();
        }
    } catch (Throwable $th) {
        echo json_encode($th->getMessage());
    }
    break;
*/
    case 'todos':
        $datos = array();
        $datos = $Roles->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
        case 'insertar':
            $Detalle = $_POST['Detalle'];
            //$Apellidos = $_POST['Apellidos'];
            //$correo = $_POST['correo'];
            //$contrasenia = $_POST['contrasenia'];
            //$idRoles = $_POST['idRoles'];
            $datos = array();
            //$datos = $Usuario->Insertar($Nombres, $Apellidos, $correo, $contrasenia,$idRoles); 
            $datos = $Roles->Insertar($Detalle);
            echo json_encode($datos);
            break;
    
        case 'actualizar':
            break;
}
