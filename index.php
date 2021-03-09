<?php 
    include "conexion.php";
    $consulta = $conexion->query("SELECT * FROM alumno;");
    $alumnos = $consulta->fetchAll(PDO::FETCH_OBJ);
    //print_r($alumnos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista de alumnos</title>
</head>
<body>
    <div>
    <h3>Lista de alumnos</h3>
    <table>
        <tr>
            <td>Id</td>
            <td>Apellido</td>
            <td>Nombre</td>
            <td>Parcial</td>
            <td>Final</td>
            <td>Promedio</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
     
        <?php 
            foreach($alumnos as $alumno){
                ?>
                <tr>
                    <td><?php echo $alumno->id ;?></td>
                    <td><?php echo $alumno->apellido ;?></td>
                    <td><?php echo $alumno->nombre ;?></td>
                    <td><?php echo $alumno->ex_parcial ;?></td>
                    <td><?php echo $alumno->ex_final ;?></td>
                    <td><?php echo ($alumno->ex_final + $alumno->ex_parcial)/2 ;?></td>
                 
                    <td><a href="editar.php?id=<?php echo $alumno->id;?>"><button>Editar</button></a></td>
                    <td><a href="eliminar.php?id=<?php echo $alumno->id;?>"><button>Eliminar</button></a></td>
                </tr>
        <?php 
            }
        ?>
    </table>

    <!--insert-->
    <hr>
    <h3>Insertar alumno</h3>
    <form action="insertar.php" method="POST">
        <table>
            <tr>
                <td>Apellido</td>
                <td>
                    <input type="text" name="apellido">
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" name="nombre">
                </td>
            </tr>
            <tr>
                <td>Parcial</td>
                <td>
                    <input type="text" name="parcial">
                </td>
            </tr>
            <tr>
                <td>Final</td>
                <td>
                    <input type="text" name="final">
                </td>
            </tr>
            <input type="hidden" name="oculto" value="1">
            <tr>
                <td><input type="submit" value="Ingresar alumno"></td>
            </tr>
        </table>
    </form>
    <!--fin insert-->
    </div>
    
</body>
</html>