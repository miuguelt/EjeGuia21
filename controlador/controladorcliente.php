<?php
include_once("../modelo/conexion.php");
$objetoconexion = new conexion();
$conexion = $objetoconexion->conectar();

include_once("../modelo/cliente.php");

$opcion = $_POST["fenviar"];
$idcliente = $_POST["fidcliente"];
$nombrecliente = $_POST["fnombrecliente"];
$documentocliente = $_POST["fdocumentocliente"];
$correocliente = $_POST["fcorreocliente"];

$nombrecliente  = htmlspecialchars($nombrecliente);
$documentocliente = htmlspecialchars($documentocliente);
$correocliente = htmlspecialchars($correocliente);

$objetocliente = new cliente($conexion,$idcliente,$nombrecliente,$documentocliente,$correocliente);

switch($opcion){
    case 'ingresar':
    $objetocliente->insertar();
    $mensaje="ingresado";

    break;

    case 'modificar':
    $objetocliente->modificar();
    $mensaje="modificado";

    break;

       case 'eliminar':
    $objetocliente->eliminar();
    $mensaje="eliminado";

    break;
}

$objetoconexion->desconectar($conexion);
header("location:../vista/formulariocliente.php?msj=$mensaje");
?>