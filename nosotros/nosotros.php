<?php
    require '../vendor/autoload.php';
    require_once '../config.inc.php';

    use App\Parametros;
    use App\Menu;

    $enlace=conexion();

    $informacion=new Parametros($enlace);

    $css=$informacion->Css();
    $js=$informacion->Js();
    $rutas=new Menu($enlace);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>::LAS PALMAS::</title>

      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
          </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>
    <main role="main" class="container">
      <div class="starter-template">
        <h1>Nosotros</h1>
        <div class="row">
          <div id="imagenes" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#imagenes" data-slide-to="0" class="active"></li>
              <li data-target="#imagenes" data-slide-to="1"></li>
              <li data-target="#imagenes" data-slide-to="2"></li>
              <li data-target="#imagenes" data-slide-to="3"></li>
              <li data-target="#imagenes" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $img.'playa1.jpg'; ?>" alt="playa uno">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $img.'playa2.jpg'; ?>" alt="playa dos">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $img.'playa3.jpg'; ?>" alt="playa tres">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $img.'playa4.jpg'; ?>" alt="playa cuatro">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $img.'playa5.jpg'; ?>" alt="playa cinco">
              </div>
            </div>
            <a class="carousel-control-prev" href="#imagenes" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imagenes" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </main>
    <!-- /.container -->
 
    <!-- Bootstrap core JavaScript

    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo $rutas::boot($rutas).'js/bootstrap.min.js'?>"></script>

  </body>
</html>
