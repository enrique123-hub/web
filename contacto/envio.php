<?php
    require '../vendor/autoload.php';
    require_once '../config.inc.php';
    include 'enviar.php';
    use Gregwar\Captcha\PhraseBuilder;
    use App\Registros;

    $enlace=conexion();
    $formulario=new Registros($enlace);

    if (!isset($_SESSION)){
        session_start();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_SESSION['phrase'])&&
            PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['phrase'])){
            $existe=$formulario->Existe(trim($_POST['correo']));
            if ($existe){
                echo json_encode(array('success'=>2, 'id'=>0));
            }else{
                $enviado=1;
                if($enviado){
                    foreach ($_POST as $key=>$value){
                        $$key=$value;
                    }
                    $datos["nombre"]=$nombre; $datos["appat"]=$appat;
                    $datos["apmat"]=$apmat; $datos["correo"]=$correo;
                    $datos["telcel"]=$telcel; $datos["fnac"]=$fnac;
                    date_default_timezone_set("America/Tijuana");
                    $fecha=date('Y-m-d H:i:s');
                    $datos["created_at"]=$created_at;
                    $registrado=$formulario->Registra('registro',$datos);
                    echo json_encode(array('success'=>1,'id'=>$registrado));
                }else{
                    echo json_encode(array('success'=>3,'id'=>0));
                }
            }
        }else{
            echo json_encode(array('success'=>0, 'id'=>0));
        }
        $_SESSION['phrase']=NULL;
        unset($_SESSION['phrase']);
        session_destroy();
    }
?>
