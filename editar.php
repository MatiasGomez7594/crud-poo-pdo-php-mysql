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
    <div>
        <h3>Editar alumno:</h3>
        <form method="POST" action="editarProceso.php">
            <table>
                <tr>
                    <td>Apellido</td>
                    <td><input type="text"  name="apellido" value="<?php echo $alumno->apellido;?>"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="nombre"  value="<?php echo $alumno->nombre;?>"></td>
                </tr>
                <tr>
                    <td>Parcial</td>
                    <td><input type="text" name="parcial"  value="<?php echo $alumno->ex_parcial;?>"></td>
                </tr>
                <tr>
                    <td>Final</td>
                    <td><input type="text" name="final"  value="<?php echo $alumno->ex_final;?>"></td>
                </tr>
                <tr>
                    <input type="hidden" name="oculto" >
                    <input type="hidden" name="id" value="<?php echo $alumno->id;?>">
                    <td><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>