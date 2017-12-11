<?php

$conexion = mysqli_connect('localhost','root','');
mysqli_select_db($conexion,'ItemMaster');
$resultado =msqli_query($conexion, "SELECT idRoll, nombreRoll, tipoRoll, nivelRoll FROM Roll");

while ($fila = mysqli_fetch_array($resultado)){
    echo "ID: ".$fila['id'].
    "<br>";
}
?>