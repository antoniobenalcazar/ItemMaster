<?php
class Roll
{
   public $IdRoll;
   public $nombreRoll;
   public $tipoRoll;
   public $nivelRoll;

   function __construct(int $IdRoll,string $nombreRoll,string $tipoRoll,string $nivelRoll){
      $this->IdRoll = $IdRoll;
      $this->nombreRoll = $nombreRoll;
      $this->tipoRoll = $tipoRoll;
      $this->nivelRoll = $nivelRoll;
   }
}
?>