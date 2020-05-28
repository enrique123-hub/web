<?php
    namespace App;

    class Parametros{
        protected $_connection;
        private $direccion;

        public function __construct($conn)
        {
            $this->_connection=$conn;
            $qry_direccion="SELECT valor FROM parametros WHERE dato='URL'";
            $res_direccion=$conn->execute($qry_direccion);
            $this->direccion=$res_direccion->fields('valor');
        }
        public function Imagen(){
            return $this->direccion."img/";
        }
        public function Css(){
            return $this->direccion."bootstrap/css/";
        }
        public function Js(){
            return $this->direccion."bootstrap/js/";
        }
    }
?>
