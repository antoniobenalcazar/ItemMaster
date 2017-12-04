<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EquipHeroe.php');
class ControladorEquipHeroe extends ControladorBase
{
   function crear(EquipHeroe $equipheroe)
   {
      $sql = "INSERT INTO EquipHeroe (IdEqph,IdCab,IdHom,IdPec,IdPie,IdBot,IdArma1,IdArma2) VALUES (?,?,?,?,?,?,?,?);";
      $parametros = array($equipheroe->IdEqph,$equipheroe->IdCab,$equipheroe->IdHom,$equipheroe->IdPec,$equipheroe->IdPie,$equipheroe->IdBot,$equipheroe->IdArma1,$equipheroe->IdArma2);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EquipHeroe $equipheroe)
   {
      $parametros = array($equipheroe->IdEqph,$equipheroe->IdCab,$equipheroe->IdHom,$equipheroe->IdPec,$equipheroe->IdPie,$equipheroe->IdBot,$equipheroe->IdArma1,$equipheroe->IdArma2,$equipheroe->id);
      $sql = "UPDATE EquipHeroe SET IdEqph = ?,IdCab = ?,IdHom = ?,IdPec = ?,IdPie = ?,IdBot = ?,IdArma1 = ?,IdArma2 = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EquipHeroe WHERE id = ?;";
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
         $sql = "SELECT * FROM EquipHeroe;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EquipHeroe WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EquipHeroe LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EquipHeroe;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EquipHeroe WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EquipHeroe WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EquipHeroe WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EquipHeroe WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}