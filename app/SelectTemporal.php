<?php
    namespace App;

    class SelectTemporal{
        protected $_connection;

        public function __construct($conn)
        {
            $this->_connection=$conn;
        }

        public function Mostrar(){
            $qry_info="SELECT * FROM temporal";
            $res_info=$this->_connection->execute($qry_info);
            $txt="";
            while (!$res_info->EOF){
                $txt.="<tr>".
                    "<td>".$res_info->fields('appat')."</td>".
                    "<td>".$res_info->fields('nombre')."</td>".
                    "</tr>";
                $res_info->movenext();
            }
            return $txt;
        }
    }
?>