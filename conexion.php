<?php 
$contrasena = "MRhkY1x1cu";
$usuario = "sql10397846";
$bd = "sql10397846";

try{
    $conexion = new PDO(
        "mysql:host=sql10.freesqldatabase.com;
        dbname=".$bd,$usuario,$contrasena,
        //para los caracteres especiales acentos y ñ
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
}catch(exception $e){
    echo "Error de conexion".$e->getMessage();

}



?>