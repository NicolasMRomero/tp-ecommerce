<?php

class Suscriptor {
  private static $email;
  private  $id;

  function __construct($email){
    $this->email = $email;
  }


public function setIdSus($id){
  $this->id = $id;
}
public function getIDSus(){
  return $this->id;
}
public function setEmailSus($email){
  $this->email = $email;
}
public function getEmailSus() {
			return $this->email;
		}
}

 ?>
