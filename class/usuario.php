<?php
class Usuario{

  private  $name;
  private  $lastname;
  private  $username;
  private  $email;
  private  $pass;
  private  $address;
  private  $city;
  private  $provincia;
  private  $avatar;
  private  $id;


public function __construct($name, $lastname, $username, $email, $pass, $address, $city, $provincia, $avatar){
  $this->name = $name;
  $this->lastname = $lastname;
  $this->username = $username;
  $this->email = $email;
	$this->pass = $pass;
  $this->addres = $address;
  $this->city = $city;
  $this->provincia = $provincia;
  $this->avatar = $avatar;

}

//todos los setters y getters

public function setName($name){
  $this->name = $name;
}
public function getName(){
  return $this->name;
}
public function setLastname($lastname){
  $this->lastname = $lastname;
}
public function getLastname(){
  return $this->lastname;
}
public function setUsername($username){
  $this->username = $username;
}
public function getUsername(){
  return $this->username;
}
public function setEmail($email){
  $this->email = $email;
}
public function getEmail() {
			return $this->email;
		}
public function setPassword($pass) {
  	return password_hash($pass, PASSWORD_DEFAULT);
  		}
public function getPassword(){
  return $this->pass;
}
public function setAddress($address) {
    $this->address = $address;
    		}
public function getAddress() {
    	return $this->address;
        		}
public function setCity($city) {
    $this->city = $city;
    		}
public function getCity() {
    return $this->city;
      		}
public function setProvincia($provincia) {
    $this->provincia = $provincia;
  	}
public function getProvincia() {
  return $this->provincia;
  		}
public function getImagen() {
			return $this->avatar;
		}
public function setId($id){
      $this->id = $id;
    }
public function getId(){
      return $this->id;
    }

function crearUsuario(DB $db){
  return[
    'name' => $this->name,
    'lastname'=> $this->lastname,
    'username' => $this->username,
    'email' => $this->email,
    'pass' => $this->setPassword($this->pass),
    'address' => $this->address,
    'city' => $this->city,
    'provincia' => $this->provincia,
    'avatar' => $this->avatar,
    'id'=> $db->traerUltimoID()
  ];
}

}




 ?>
