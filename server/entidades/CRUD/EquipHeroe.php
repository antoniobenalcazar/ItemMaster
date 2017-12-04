<?php
class EquipHeroe
{
   public $IdEqph;
   public $IdCab;
   public $IdHom;
   public $IdPec;
   public $IdPie;
   public $IdBot;
   public $IdArma1;
   public $IdArma2;

   function __construct(int $IdEqph,int $IdCab,int $IdHom,int $IdPec,int $IdPie,int $IdBot,int $IdArma1,int $IdArma2){
      $this->IdEqph = $IdEqph;
      $this->IdCab = $IdCab;
      $this->IdHom = $IdHom;
      $this->IdPec = $IdPec;
      $this->IdPie = $IdPie;
      $this->IdBot = $IdBot;
      $this->IdArma1 = $IdArma1;
      $this->IdArma2 = $IdArma2;
   }
}
?>