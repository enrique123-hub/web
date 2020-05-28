<?php
    namespace App;

    class SelectForm{
        protected $_connection;

        public function __construct($conn)
        {
            $this->_connection=($conn);
        }
        public function Listado(){
            $txt="";
            $qry_info="SELECT etiqueta,nombre_dato,nombre_mostrar,tipo_dato FROM formulario";
            $res_info=$this->_connection->execute($qry_info);
            while (!$res_info->EOF){
                $txt2=$res_info->fields('nombre_dato')=='correo'?"":" onchange='this.value=this.value.toUpperCase()'";
                $txt.="<div class='form-group'>".
                            "<label for='".$res_info->fields('etiqueta')."'>".
                                utf8_decode($res_info->fields('nombre_mostrar'))."</label>".
                            "<input type='".$res_info->fields('tipo_dato').
                            "' class='form-control' id='".$res_info->fields('etiqueta').
                            "' name='".$res_info->fields('nombre_dato')."' ".
                            $txt2. "></div>";
                $res_info->movenext();
            }
            return $txt;
        }
    }
?>
