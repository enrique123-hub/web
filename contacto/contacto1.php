<?php
    require '../vendor/autoload.php';
    require_once '../config.inc.php';

    use App\Parametros;
    use App\Menu;
    use Gregwar\Captcha\PhraseBuilder;

    if (!isset($_SESSION)){
        session_start();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_SESSION['phrase']) &&
            PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['phrase'])){
            $bandera=1;
        }else{
            $bandera=0;
        }
        $_SESSION['phrase']=NULL;
        unset($_SESSION['phrase']);
        session_destroy();
    }
    $enlace=conexion();

    $informacion=new Parametros($enlace);

    $css=$informacion->Css();
    $js=$informacion->Js();
    $rutas=new Menu($enlace);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>::LAS PALMAS::</title>

        <!-- Bootstrap core CSS
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/style.css" rel="stylesheet">

        <script src="<?php echo $js.'jquery-1.11.1.js'?>"></script>
        <script src="<?php echo $js.'jquery.validate.js';?>"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <?php
                    $menu_activo=$rutas->Datos();
                    echo $menu_activo;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contacto/Contacto.php">Contactos</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <main role="main" class="container">
            <div class="starter-template">
                <h1>Contacto</h1>
                <?php
                    if ($bandera=="0"){?>
                <h1>Su informacion ah sido almacenada</h1>
                <?php}else{ ?>
                <h2>Tuvimos un problema con su informacion</h2>
                <?php }
                ?>
            </div>
        </main><!-- /.container -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">
        </script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
