<?php
    require '../vendor/autoload.php';
    require_once '../config.inc.php';

    use App\Parametros;
    use App\Menu;
    use App\SelectForm;
    use Gregwar\Captcha\CaptchaBuilder;
    if (!isset($_SESSION)){
        session_start();
    }
    $enlace=conexion();
    $informacion=new Parametros($enlace);
    $css=$informacion->Css();
    $js=$informacion->Js();
    $rutas=new Menu($enlace);
    $builder = new CaptchaBuilder;
    $builder->build();
?>
<!doctype html>
<html lang="en">
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
            <h1>Contactos</h1>
            <p class="lead">¿Desea mayor informacion?</p>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <p>Si requiere mayor informacion</p><br/>
                    </div>
                </div>
                <form name="myform" id="myform" method="post" action="contacto1.php" role="form">
                    <?php
                        $formulario = new SelectForm($enlace);
                        $datos_formulario=$formulario->Listado();
                        echo $datos_formulario;
                    ?>
                    <div class="form-group">
                        <img src="<?php echo $builder->inline(); ?>" /><br>
                        <label for="phrase">Captcha</label>
                        <input type="text" name="phrase" id="phrase" required class="form-control">
                    </div>
                    <?php
                        $_SESSION['phrase']=$builder->getPhrase();
                    ?>
                    <button type="submit" class="btn btn-primary">continuar</button>
                </form>
                <script type="text/javascript" src="../bootstrap/js/validar.js"></script>
            </div>
        </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>