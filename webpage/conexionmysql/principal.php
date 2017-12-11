<?php


function conectar(){

    $user="root";
    $pass="";
    $server="localhost";
    $db="ItemMaster";
    $con=mysql_connect($server,$user,$pass) or die ("no mijin no te conectaste".mysql_error());
    mysql_select_db($db,$con);

    return $con;
}
?>