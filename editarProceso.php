<?php
print_r($_POST);
if(!isset($_POST['oculto'])){
    header("Location: index.php");
}

include "conexion.php";
$id = $_POST['id'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$parcial = $_POST['parcial'];
$final = $_POST['final'];

$consulta = $conexion->prepare("UPDATE alumno SET apellido= ?,nombre= ?,ex_parcial= ?,ex_final= ? 
                                WHERE id= ?;");
$resultado = $consulta->execute([$apellido,$nombre,$parcial,$final,$id]);
if($resultado){
    header('Location: index.php');
}else{
    echo "Hubo un error intente mas tarde";
}


?>