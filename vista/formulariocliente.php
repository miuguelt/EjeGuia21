<html>
<head>
    <meta charset="utf-8">
    <title>formulario cliente</title>
    </head>
    <body>
<header>
    <h1>formulario cliente</h1>
    </header>
    <table border"1">
    <tbody>
        <tr>
        <th scope="col">nombre cliente</th>
         <th scope="col">documento cliente</th>
          <th scope="col">Email cliente</th>
           <th scope="col"></th>
        </tr>

<?php
include_once("../modelo/conexion.php");
$objetoconexion = new conexion();
$conexion =$objetoconexion->conectar();

include_once("../modelo/cliente.php");
$objetocliente = new cliente($conexion,0,'nombre','documento','correo');
$listaclientes = $objetocliente->listar(0);
while($unregistro =mysqli_fetch_array($listaclientes)){
    
    echo '<tr><form id="fmodificarcliente"'.$unregistro["idCliente"].' action="../controlador/controladorcliente.php"
    method="post">';
    echo '<td><input type="hidden" name="fidcliente"   value="'.$unregistro['idCliente'].'">';
    echo '  <input type="text" name="fnombrecliente"  value="'.$unregistro['nombreCliente'].'"></td>';
    echo '<td><input type="number" name="fdocumentocliente"  value="'.$unregistro['documentoCliente'].'"></td>';
    echo '<td><input type="email" name="fcorreocliente"  value="'.$unregistro['correoCliente'].'"></td>';
    echo '<td><button type="submit" name="fenviar" value="modificar">Mod</button>
    <button type="submit" name="fenviar" value="eliminar">-</button></td>';
    echo '</form></tr>';

}
?>


<tr><form id="fingresarcliente" action="../controlador/controladorcliente.php" method="post">
<td><input type="hidden" name="fidcliente" value="0">
<input type="text" name="fnombrecliente"></td>
<td><input type="number" name="fdocumentocliente"></td>
<td><input type="email" name="fcorreocliente"></td>
<td><button type="submit" name="fenviar" value="ingresar">+Insertar</button>
<button type="reset" name="fenviar" value="limpiar">Limpiar</button></td>
</form> </tr>
</tbody>
</table>
<?php
mysqli_free_result($listaclientes);
$objetoconexion->desconectar($conexion);
?>
</body>
</html>
