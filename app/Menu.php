<?php
    namespace App;
    class Menu{
        protected $_connection;
        private $ubicacion;
        public function __construct($conn)
        {
            $this->_connection=$conn;
            $qry_ruta="SELECT valor FROM parametros WHERE dato='Location'";
            $res_ruta=$conn->execute($qry_ruta);
            $this->ubicacion=$res_ruta->fields('valor');
        }
        public function Datos(){
            $txt="";
            $qry_info="SELECT nombre_visible,ubicacion FROM menu WHERE activo=1";
            $res_info=$this->_connection->execute($qry_info);
            while (!$res_info->EOF){
                $txt.="<li class='nav-item'>".
                       "<a class='nav-link' href='".
                        $res_info->fields('ubicacion')."'>".
                        $res_info->fields('nombre_visible')."</a>".
                      "</li>";
                $res_info->movenext();
            }
            return $txt;
        }
    }
?>
