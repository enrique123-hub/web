<?php
    $dotenv=\Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require_once 'adodb/adodb.inc.php';

    function enlace(){
        $valores=array('user'=>getenv('CORREO'), 'access'=>getenv('CONTRA'));
        return $valores;
    }

    function conexion()
    {
        $enlace=ADONewConnection(getenv('DRIVER'));
        $enlace->connect(
            getenv('HOST'),
            getenv('USER'),
            getenv('PWD'),
            getenv('BD')
        );
        return $enlace;

    }?>