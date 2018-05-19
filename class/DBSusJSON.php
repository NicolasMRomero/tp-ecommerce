<?php
require_once('dbsuscriptos.php');

class DBSusJSON extends DBS{
  private $suscriptos;

  public function __construct(){
    $this->suscriptos = "suscriptos.json";
  }

public function traerSuscriptos(){
        $suscriptosJSON = file_get_contents($this->suscriptos);
        $suscriptosArray = explode(PHP_EOL, $suscriptosJSON);
        array_pop($suscriptosArray);
        $suscriptores = [];
          foreach ($suscriptosArray as $unSuscripto) {
              $suscriptoJSON[] = json_decode($unSuscripto, true);
              $unSuscripto = new Suscriptor($suscriptoJSON['email']);
              $unSuscripto->setIdSus($suscriptoJSON['id']);
              $suscriptores[] = $unSuscripto;
            }
    return $suscriptores;
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
