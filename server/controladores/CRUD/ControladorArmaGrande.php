<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/ArmaGrande.php');
class ControladorArmaGrande extends ControladorBase
{
   function crear(ArmaGrande $armagrande)
   {
      $sql = "INSERT INTO ArmaGrande (IdArmaG,nombreArma,tipoArma,nivelArma) VALUES (?,?,?,?);";
      $parametros = array($armagrande->IdArmaG,$armagrande->nombreArma,$armagrande->tipoArma,$armagrande->nivelArma);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(ArmaGrande $armagrande)
   {
      $parametros = array($armagrande->IdArmaG,$armagrande->nombreArma,$armagrande->tipoArma,$armagrande->nivelArma,$armagrande->id);
      $sql = "UPDATE ArmaGrande SET IdArmaG = ?,nombreArma = ?,tipoArma = ?,nivelArma = ? WHERE id = ?;";
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
      $sql = "DELETE FROM ArmaGrande WHERE id = ?;";
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
         $sql = "SELECT * FROM ArmaGrande;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ArmaGrande WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM ArmaGrande LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM ArmaGrande;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM ArmaGrande WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM ArmaGrande WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ArmaGrande WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ArmaGrande WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}