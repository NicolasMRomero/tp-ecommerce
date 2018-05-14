<?php
require_once('dbsuscriptos.php');

class DBSusJSON extends DBS{
  private $suscriptos;

  public function __construct(){
    $this-> suscriptos = "suscriptos.json";
  }

public function traerSuscriptos(){
        $suscriptosJSON = file_get_contents($this->suscriptos);
        $suscriptosArray = explode(PHP_EOL, $suscriptosJSON);
        array_pop($suscriptosArray);
        $suscriptosPHP = [];
          foreach ($suscriptosArray as $unSuscripto) {
              $suscriptosPHP[] = json_decode($unSuscripto, true);
              $unSuscripto = new Suscriptor($suscriptosPHP['email']);
              $unSuscripto->setIdSus($suscriptosPHP['id']);
              $suscriptosPHP[]=$unSuscripto;
            }
    return $suscriptosPHP;
    }


public function traerUltIDSuscriptos(){
        $todos = $this->traerSuscriptos();
          if (count($todos) == 0){
            return 1;
          }
    $ultimoSuscripto = array_pop($todos);
    $ultimoIDSuscripto = $ultimoSuscripto->getIDSus();
    return $ultimoIDSuscripto + 1;
  }

}
