<?php
//los datos se envian por el metodo get
//print_r($_GET);
if(!isset($_GET['id'])){
    exit();
    header("Location: index.php");
}
$id = $_GET['id'];
include "conexion.php";


$consulta = $conexion->prepare("SELECT * FROM alumno WHERE id = ?;");
$consulta->execute([$id]);
$alumno = $consulta->fetch(PDO::FETCH_OBJ);
//para ver lo que trae alumno
//print_r($alumno);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>¿Está seguro de querer borrar el registro del estudiante <?php echo $alumno->apellido." ".$alumno->nombre;?>?</h1>
    <form method="POST">
        <input type="submit" value="aceptar" name="aceptar">
        <input type="submit" value="cancelar" name="cancelar">
        <input type="hidden" value="<?php echo $alumno->id;?>" name ="id">
    </form>
    <?php
        //print_r($_POST);
        if(isset($_POST['aceptar'])){
            $id = $_POST['id'];
            //no es conveniente pasar la consulta directamente por seguridad se pone prepare()
            //para que no me haga inyeccion sql
            $consulta = $conexion->prepare("DELETE FROM alumno WHERE id = ?;");
            $resultado = $consulta->execute([$id]);
            if($resultado){
                header("location: index.php");
            }

        }
        if(isset($_POST['cancelar'])){
            header("location: index.php");
        }
    
    ?>
    
</body>
</html>