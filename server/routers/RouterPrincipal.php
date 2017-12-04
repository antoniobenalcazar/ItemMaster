<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "armagrande":
            $routerArmaGrande = new RouterArmaGrande();
            return json_encode($routerArmaGrande->route());
            break;
         case "armapeq":
            $routerArmaPeq = new RouterArmaPeq();
            return json_encode($routerArmaPeq->route());
            break;
         case "armadura":
            $routerArmadura = new RouterArmadura();
            return json_encode($routerArmadura->route());
            break;
         case "equipheroe":
            $routerEquipHeroe = new RouterEquipHeroe();
            return json_encode($routerEquipHeroe->route());
            break;
         case "heroe":
            $routerHeroe = new RouterHeroe();
            return json_encode($routerHeroe->route());
            break;
         case "raza":
            $routerRaza = new RouterRaza();
            return json_encode($routerRaza->route());
            break;
         case "roll":
            $routerRoll = new RouterRoll();
            return json_encode($routerRoll->route());
            break;
         case "tipo":
            $routerTipo = new RouterTipo();
            return json_encode($routerTipo->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
