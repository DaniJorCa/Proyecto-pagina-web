<?php
include('persona_model.php');

class Usuario extends Persona{
    public $puesto;
    public $perfil;


    public function __construct($id, $nombre, $primApellido, $segApellido,
    $dni, $direccion, $provincia, $poblacion, $codPostal, $telefono, $email,
    $esBaja, $puesto, $perfil){

        parent::__construct($id, $nombre, $primApellido, $segApellido,
        $dni, $direccion, $provincia, $poblacion, $codPostal, $telefono, $email,
        $esBaja);
        $this->puesto = $puesto;
        $this->perfil = $perfil;

    }

public function generarID(){
    $letras = new Array();
    $numeros = new Array();
    
}

}


?>