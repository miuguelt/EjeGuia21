<?php
  class cliente {
      private $_conexion;
      private $_idcliente;
      private $_nombrecliente;
      private $_documentocliente;
      private $_correocliente;
      private $_paginacion =10;

      function __construct ($conexion,$idcliente,$nombrecliente,$documentocliente,$correocliente){
          $this->_conexion=$conexion;
          $this->_idcliente=$idcliente;
          $this->_nombrecliente=$nombrecliente;
          $this->_documentocliente=$documentocliente;
          $this->_correocliente=$correocliente;
      }

      function _get($k){
          return $this->$k;
      }

      function _set($k,$v){
         $this->$k =$v;
      }

    function insertar (){
        $insercion= mysqli_query($this->_conexion,"INSERT INTO 
        cliente (idcliente, nombrecliente, documentocliente, correocliente) VALUES (NULL,'$this->_nombrecliente','$this->_documentocliente','$this->_correocliente')");
        $auditoria = mysqli_query ($this->_conexion,"INSERT INTO auditoria(idauditoria,detalleauditoria,idusuarioauditoria,fechaauditoria) VALUES  (null, 'inserto cliente,".$_SESSION['idusuario'].",'CURDATE()')");
        return $insercion;
    }

    function modificar(){
        $modificacion=mysqli_query($this->_conexion," UPDATE cliente SET nombrecliente='$this->_nombrecliente', documentocliente='$this->_documentocliente', correocliente='$this->_correocliente' WHERE idcliente=$this->_idcliente");
        $auditoria=mysqli_query($this->_conexion,"INSERT INTO auditoria(idauditoria,detalleauditoria,idusuarioauditoria,fechaauditoria) VALUES(NULL,'modifico".static::class.",'Prueba','CURDATE()')");
        var_dump($variable);
        print("Preferiblemante String");
        return $modificacion;
    }

    function eliminar(){
        $eliminacion =mysqli_query($this->_conexion,"DELETE FROM cliente WHERE idcliente=$this->_idcliente");
        $auditoria=mysqli_query($this->_conexion,"INSERT INTO auditoria(idauditoria,detalleauditoria,idusuarioauditoria,fechaauditoria) VALUES(NULL,'modifico".static::class.",".$_session['idusuario'].",'CURDATE()')");
        return $eliminacion; 
    }

    function cantidadpaginas(){
        $cantidaddebloques=mysqli_query($this->_conexion, "SELECT CEIL (COUNT (idcliente)/$this->_paginacion) AS cantidad FROM cliente") or die (mysqli_error($this->_conexion));
        $unregistro=mysqli_fetch_array($cantidadbloques);
        return $unregistro['cantidad'];
    }

    function listar ($pagina){
       
        if ($pagina<=0){
            $listado=mysqli_query($this->_conexion,"SELECT * FROM cliente ORDER BY idcliente") or die (mysqli_error($this->_conexion)); 
        }else{
            $paginacionMax = $pagina *$this->_paginacion;
            $paginacionMin = $paginacionMax - $this->_paginacion;
            $listado=mysqli_query($this->_conexion,"SELECT* FROM cliente ORDER BY idcliente LIMIT $paginacionMin, $paginacionMax") or die (mysqli_error($this->conexion));
        }
        return $listado;
    } 
 }
 ?>