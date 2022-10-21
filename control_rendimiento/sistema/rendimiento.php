<?php
 function Conectar($usuario,$clave)
 {
     try {
         $conexion = new PDO("mysql:host=192.185.32.223;dbname=webapsgt_control_rendimiento;charset=utf8", $usuario, $clave);          
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conexion;
     } catch (PDOException $e) {
         exit($e->getMessage());
     }
 }
function getParams($input){  
    $filterParams = [];
    foreach($input as $param => $value){
        $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
}
function bindAllValues($statement, $params){
    foreach($params as $param => $value){
        $statement->bindValue(':'.$param, $value);
    }
    return $statement;
}
function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();
$conexion =  Conectar("webapsgt_admin","DesaUmg2021*");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['id'])) {      
      $sql = $conexion->prepare("SELECT R.*,CONCAT(T.nombre,' ',T.apellidos) AS nombre FROM rendimiento AS R,cliente as T WHERE R.id_tenista =T.idcliente AND id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
      exit();
    }
    else{      
      $sql = $conexion->prepare("SELECT R.*,CONCAT(T.nombre,' ',T.apellidos) AS nombre FROM rendimiento AS R,cliente as T WHERE R.id_tenista =T.idcliente");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll());
      exit();
    }
}


header("HTTP/1.1 400 Peticion HTTP inexistente");
?>