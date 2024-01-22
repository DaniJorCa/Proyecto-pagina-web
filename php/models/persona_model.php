<?php
    class Persona {
        public $id;
        public $nombre;
        public $primApellido;
        public $segApellido;
        public $dni;
        public $direccion;
        public $provincia;
        public $poblacion;
        public $codPostal;
        public $telefono;
        public $email;
        public $esBaja;

        public function __construct($id, $nombre, $primApellido, $segApellido,
        $dni, $direccion, $provincia, $poblacion, $codPostal, $telefono, $email,
        $esBaja) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->primApellido = $primApellido;
            $this->segApellido = $segApellido;
            $this->dni = $dni;
            $this->direccion = $direccion;
            $this->provincia = $provincia;
            $this->ipoblacion = $poblacion;
            $this->codPostal = $codPostal;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->esBaja = $esBaja;
        }
    }


?>