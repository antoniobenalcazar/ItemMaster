<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Heroe.php');
class ControladorHeroe extends ControladorBase
{
   function crear(Heroe $heroe)
   {
      $sql = "INSERT INTO Heroe (IdHeroe,nombreHeroe,IdTipoHeroe,IdRazaHeroe,IdRoll,IdEqph) VALUES (?,?,?,?,?,?);";
      $parametros = array($heroe->IdHeroe,$heroe->nombreHeroe,$heroe->IdTipoHeroe,$heroe->IdRazaHeroe,$heroe->IdRoll,$heroe->IdEqph);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Heroe $heroe)
   {
      $parametros = array($heroe->IdHeroe,$heroe->nombreHeroe,$heroe->IdTipoHeroe,$heroe->IdRazaHeroe,$heroe->IdRoll,$heroe->IdEqph,$heroe->id);
      $sql = "UPDATE Heroe SET IdHeroe = ?,nombreHeroe = ?,IdTipoHeroe = ?,IdRazaHeroe = ?,IdRoll = ?,IdEqph = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Heroe WHERE id = ?;";
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
         $sql = "SELECT * FROM Heroe;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Heroe WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Heroe LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Heroe;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Heroe WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Heroe WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Heroe WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Heroe WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}