<?php
class Armadura
{
   public $IdArmadura;
   public $nombreArmadura;
   public $tipoArmadura;
   public $nivelArmadura;

   function __construct(int $IdArmadura,string $nombreArmadura,string $tipoArmadura,string $nivelArmadura){
      $this->IdArmadura = $IdArmadura;
      $this->nombreArmadura = $nombreArmadura;
      $this->tipoArmadura = $tipoArmadura;
      $this->nivelArmadura = $nivelArmadura;
   }
}
?>