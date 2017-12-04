<?php
class ArmaPeq
{
   public $IdarmaP;
   public $nombreArma;
   public $nipoArma;
   public $nivelArma;

   function __construct(int $IdarmaP,string $nombreArma,string $nipoArma,string $nivelArma){
      $this->IdarmaP = $IdarmaP;
      $this->nombreArma = $nombreArma;
      $this->nipoArma = $nipoArma;
      $this->nivelArma = $nivelArma;
   }
}
?>