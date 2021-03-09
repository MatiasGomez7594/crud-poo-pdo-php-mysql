<?php
//Asi veo 
//print_r($_POST);

//si no existe la variable oculto 
if(!isset($_POST['oculto']) ){
    exit();
}

if(strlen($_POST['apellido'])>0 && strlen($_POST['nombre'])>0 && strlen($_POST['parcial'])>0 &&
    strlen($_POST['final'])>0){
    include "conexion.php";
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $parcial = $_POST['parcial'];
    $final = $_POST['final'];

    //no es conveniente pasar la consulta directamente por seguridad se pone prepare()
    //para que no me haga inyeccion sql
    $consulta = $conexion->prepare("INSERT INTO alumno(apellido,nombre,ex_parcial,ex_final) VALUES (?,?,?,?);");
    $resultado = $consulta->execute([$apellido,$nombre,$parcial,$final]);
    if($resultado){
        header('Location: index.php');
    }else{
        echo "Hubo un error intente mas tarde";
    }

}else{
    header('Location: index.php');
}





?>