<?php
    class Usuario {
        public $dni;
        public $password;
        public $nombre;
        public $primer_apellido;
        public $segundo_apellido;
        public $direccion;
        public $provincia;
        public $poblacion;
        public $cod_postal;
        public $telefono;
        public $email;
        public $perfil;
        public $esBaja;

        public function __construct($dni, $password, $nombre, $primer_apellido, $segundo_apellido,
        $direccion, $provincia, $poblacion, $cod_postal, $telefono, $email, $perfil, $esBaja) {
            $this->dni = $dni;
            $this->password = $password;
            $this->nombre = $nombre;
            $this->primer_apellido = $primer_apellido;
            $this->segundo_apellido = $segundo_apellido;
            $this->direccion = $direccion;
            $this->provincia = $provincia;
            $this->ipoblacion = $poblacion;
            $this->codPostal = $cod_postal;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->perfil = $perfil;
            $this->esBaja = $esBaja;
        }
    }


?>