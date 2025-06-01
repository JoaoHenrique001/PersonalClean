<?php
include './assets/ajax/conexionBD.php';
session_start();
 echo "<pre>";
 var_dump($_SESSION);
 echo "</pre>";
if (!$_SESSION['usuario']['tipo']) {
    header("Location: logout.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Funcionario | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/chat.js"></script> 
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>
    <?php include_once './assets/headerLogueado.php'; ?>

      <!--inicio migas de pan-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">Area Principal</li>
    <li class="breadcrumb-item">Pagina de contratación</li>
    </ol>
    </nav>
    <!--fin migas de pan-->
   
    <div class="areaChat">
        <aside class="conversasiones">
            <!--elemento que se repite dependera de lo select y lo dato de la base de datos-->
            <a href="">
            <div class="conversasiones_persona">
                <img src="./assets/images/userIcon.svg" alt="">
                <p class="conversasiones_nombre">Sheapard</p>
            </div>
            </a>
            <a href="">
            <div class="conversasiones_persona">
                <img src="./assets/images/userIcon.svg" alt="">
                <p class="conversasiones_nombre">Sheapard</p>
            </div>
            </a>
            <a href="">
            <div class="conversasiones_persona">
                <img src="./assets/images/userIcon.svg" alt="">
                <p class="conversasiones_nombre">Sheapard</p>
            </div>
            </a>
            <a href="">
            <div class="conversasiones_persona">
                <img src="./assets/images/userIcon.svg" alt="">
                <p class="conversasiones_nombre">Sheapard</p>
            </div>
            </a>
            <!--elemento que se repite dependera de lo select y lo dato de la base de datos-->
        </aside>

        <div class="chat">
            <!--elemento que dependera de los datos de la base de datos--> 
            <div class="cajaSecundario">
                <p>Hola que tal tio? mira te acabo de enviar una propuesta de trabajo</p>
                <span>23:13</span>
            </div>
            <div class="cajaPrincipal">
                <p>ostias! en serio dices?😯</p>
                <span>23:14 <img src="./assets/images/eyeOpen.svg" alt=""></span>
            </div>
             <div class="cajaSecundario">
                <p>Se trata de un servicio de limpieza profunda para residencias. Incluye limpieza completa de baños (inodoros, duchas, espejos, azulejos), limpieza de cocina (electrodomésticos, campana, superficies y fregadero), aspirado y fregado de todos los pisos, limpieza de ventanas internas, eliminación de polvo en muebles, puertas y rodapiés, y recolección de basura. Todo de forma detallada y con productos adecuados.</p>
                <span>23:15</span>
            </div>
            <div class="cajaPrincipal">
                <p>paso tio, soy un vago, solo de oir ya me da pereza😩</p>
                <span>23:16 <img src="./assets/images/eyeClosed.svg" alt="Visto"></span>
            </div>
            <div class="envioMensaje">
                <form method="POST">
                    <textarea name="mensajeChat" id="mensajeChat" placeholder="Escribir mensaje"></textarea>
                    <button><img src="./assets/images/sendMessage.svg" alt="No Visto"></button>
                </form>
            </div>
            <!--elemento que dependera de los datos de la base de datos--> 
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>