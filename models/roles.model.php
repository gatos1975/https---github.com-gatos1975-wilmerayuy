<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class RolesModel
{
    public function todos(){  //TODO: CProcedimeinto para obtener todos los registros de la BDD
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM roles ";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function Insertar($detalle){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `roles`(`Detalle`) VALUES ('$detalle')";
        $datos = mysqli_query($con,$cadena);
        //if(mysqli_insert_id($con) > 0){
            //definir el modelo usuarios_roles
            //$UsuarioRoles = new UsuariosRolesModel();
            //return $UsuarioRoles->Insertar(mysqli_insert_id($con), $idRoles);
        //}else{
          //  return 'Error al insertar el rol del usuario';
        //}
    }
}
