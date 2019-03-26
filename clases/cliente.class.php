<?php
require_once('../persistencia/PersistenciaCliente.class.php');

class Cliente {
  private $ID;
  private $CALLE;
  private $NUMERO;
  private $ESQUINA;
  private $EMAIL;
  private $BAJA;
  
  function __construct($i='',$c='', $n='', $es='',$em='',$ba=''){
    $this->ID= $i;
    $this->CALLE= $c;
    $this->NUMERO= $n;
    $this->ESQUINA= $es;
    $this->EMAIL= $em;
    $this->BAJA= $ba;
  }

  public function setID($i){
    $this->ID=$i;
  }
  public function setCALLE($c){
    $this->CALLE=$c;
  }
  public function setNUMERO($n){
    $this->NUMERO=$n;
  }
  public function setESQUINA($es){
    $this->ESQUINA=$es;
  }
  public function setEMAIL($em){
    $this->EMAIL=$em;
  }
  public function setBAJA($ba){
    $this->BAJA=$ba;
  }

  public function getID(){
    return $this->ID;
  }
  public function getCALLE(){
    return $this->CALLE;
  }
  public function getNUMERO(){
    return $this->NUMERO;
  }
  public function getESQUINA(){
    return $this->ESQUINA;
  }
  public function getEMAIL(){
    return $this->EMAIL;
  }
  public function getBAJA(){
    return $this->BAJA;
  }

    // ----------- ------------------ -----------
    //  ----------- OTROS METODOS --------------
  public function alta($conex){
    $pu=new PersistenciaUsuario;
    return ($pu->agregar($this, $conex));
  }


  public function baja($conex){
    $pu=new PersistenciaUsuario;
    return($pu->eliminar($this, $conex));
  }


  public function modificacion($conex) {
    $pu=new PersistenciaUsuario;
    return($pu->modificar($this, $conex));
  }

  public function consultaTodos($conex){
    $pu=new PersistenciaUsuario;
    $datos= $pu->consTodos($conex);
    return $datos;
  }

  public function consultaUno($conex){
    $pu=new PersistenciaUsuario;
    $datos= $pu->consUno($this,$conex);
    return $datos;
  }  
}
?>