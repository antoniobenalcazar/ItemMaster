<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/ArmaPeq.php');
class ControladorArmaPeq extends ControladorBase
{
   function crear(ArmaPeq $armapeq)
   {
      $sql = "INSERT INTO ArmaPeq (IdarmaP,nombreArma,nipoArma,nivelArma) VALUES (?,?,?,?);";
      $parametros = array($armapeq->IdarmaP,$armapeq->nombreArma,$armapeq->nipoArma,$armapeq->nivelArma);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(ArmaPeq $armapeq)
   {
      $parametros = array($armapeq->IdarmaP,$armapeq->nombreArma,$armapeq->nipoArma,$armapeq->nivelArma,$armapeq->id);
      $sql = "UPDATE ArmaPeq SET IdarmaP = ?,nombreArma = ?,nipoArma = ?,nivelArma = ? WHERE id = ?;";
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
      $sql = "DELETE FROM ArmaPeq WHERE id = ?;";
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
         $sql = "SELECT * FROM ArmaPeq;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ArmaPeq WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM ArmaPeq LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM ArmaPeq;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM ArmaPeq WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM ArmaPeq WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ArmaPeq WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ArmaPeq WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}