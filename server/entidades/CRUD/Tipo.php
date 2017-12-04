<?php
class Tipo
{
   public $IdTipo;
   public $nombreTipoHeroe;

   function __construct(int $IdTipo,int $nombreTipoHeroe){
      $this->IdTipo = $IdTipo;
      $this->nombreTipoHeroe = $nombreTipoHeroe;
   }
}
?>