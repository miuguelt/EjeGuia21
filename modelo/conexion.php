<?php
class conexion{
  function conectar(){
    $conexion =mysqli_connect("mysql-tejedor63.alwaysdata.net","tejedor63_user","1a2s3d4fasdf","tejedor63_mibd");
    mysqli_query($conexion, "SET NAMES 'utf8' ");
    return $conexion;
  }
  function desconectar($conexion){
    mysqli_close($conexion);
  }
}
?>