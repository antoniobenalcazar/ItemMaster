<?php
class Raza
{
   public $IdRaza;
   public $IdRazaHeroe;
   public $nombreRaza;

   function __construct(int $IdRaza,int $IdRazaHeroe,string $nombreRaza){
      $this->IdRaza = $IdRaza;
      $this->IdRazaHeroe = $IdRazaHeroe;
      $this->nombreRaza = $nombreRaza;
   }
}
?>