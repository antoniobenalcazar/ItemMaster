<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Roll.php');
class ControladorRoll extends ControladorBase
{
   function crear(Roll $roll)
   {
      $sql = "INSERT INTO Roll (IdRoll,nombreRoll,tipoRoll,nivelRoll) VALUES (?,?,?,?);";
      $parametros = array($roll->IdRoll,$roll->nombreRoll,$roll->tipoRoll,$roll->nivelRoll);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Roll $roll)
   {
      $parametros = array($roll->IdRoll,$roll->nombreRoll,$roll->tipoRoll,$roll->nivelRoll,$roll->id);
      $sql = "UPDATE Roll SET IdRoll = ?,nombreRoll = ?,tipoRoll = ?,nivelRoll = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Roll WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Roll;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Roll WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Roll LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Roll;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Roll WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Roll WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Roll WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Roll WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}