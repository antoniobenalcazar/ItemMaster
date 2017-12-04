<?php
class Heroe
{
   public $IdHeroe;
   public $nombreHeroe;
   public $IdTipoHeroe;
   public $IdRazaHeroe;
   public $IdRoll;
   public $IdEqph;

   function __construct(int $IdHeroe,string $nombreHeroe,int $IdTipoHeroe,int $IdRazaHeroe,int $IdRoll,int $IdEqph){
      $this->IdHeroe = $IdHeroe;
      $this->nombreHeroe = $nombreHeroe;
      $this->IdTipoHeroe = $IdTipoHeroe;
      $this->IdRazaHeroe = $IdRazaHeroe;
      $this->IdRoll = $IdRoll;
      $this->IdEqph = $IdEqph;
   }
}
?>