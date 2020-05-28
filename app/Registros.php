<?php
    namespace App;

    class Registros{
        protected $_connection;

        public function __construct($conn)
        {
            $this->_connection=$conn;
        }
        public function Existe($correo=null){
            $qry_existe="SELECT COUNT(*) AS existe FROM registro WHERE correo='".$correo."'";
            $res_existe=$this->_connection->execute($qry_existe);
            return $res_existe->fields('existe');
        }

        public function Registra( $table, $variables = array()){
            $sql = "INSERT INTO".$table;
            $fields = array();
            $values = array();
            foreach ( $variables as $field => $value){
                $fields[] = $field;
                $values[] = "'".$value."'";
            }
            $fields = '('.implode(', ', $fields). ')';
            $values = '('.implode(', ', $values).')';

            $sql.= $fields .'VALUES'. $values;
            $res_sql=$this->_connection->execute($sql);
            $id=$this->_connection->insert_Id($res_sql);
            return $id;
        }
    }
?>
