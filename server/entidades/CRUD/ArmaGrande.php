<?php
class ArmaGrande
{
   public $IdArmaG;
   public $nombreArma;
   public $tipoArma;
   public $nivelArma;

   function __construct(int $IdArmaG,string $nombreArma,string $tipoArma,string $nivelArma){
      $this->IdArmaG = $IdArmaG;
      $this->nombreArma = $nombreArma;
      $this->tipoArma = $tipoArma;
      $this->nivelArma = $nivelArma;
   }
}
?>