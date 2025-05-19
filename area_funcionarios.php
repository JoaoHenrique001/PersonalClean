<?php
// session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
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
    <script src="./assets/js/cajaAviso.js"></script> <!--puede ser que crie otro archivo js-->
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>
    <?php include_once './assets/headerLogueado.php'; ?>

      <!--inicio migas de pan-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">Area Principal</li>
    </ol>
    </nav>
    <!--fin migas de pan-->

    <div class="soyPrincipal">
        <div class="listadoGeneral">
            <div class="elementoCaja">
                <p class="elementoCaja-timeinfo">Creado hace<span>2 horas</span></p>    
                <p class="elementoCaja-tituloServ">
                    Titulo
                </p>
                <p class="elementoCaja-timeinfo">Lunes</p> 
                
                <p class="elementoCaja-descripcion">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, quod aliquam tempore magnam nam accusamus cumque sunt ipsum, adipisci animi repudiandae sequi iste odit vel nostrum dolor incidunt eos doloribu...</p>
                <a href="">Ver mas</a>
                <div class="elementoCaja-data">
                    <p class="data-dinero"><span>80</span>€ Semana</p>
                    <p class="data-localidad"><img src="./assets/images/mappoint.svg" alt="">Madrid - Madrid</p>
                    <p class="data-person"><img src="./assets/images/personpc.svg" alt=""><span>Laura</span>:<img src="./assets/images/halfstar.svg" alt=""></p>
                    <p class="data-twork"><img src="./assets/images/handwork.svg" alt=""><span>Tipo:</span>Limpieza semanal</p>
                    <p class="data-estado"></p>
                </div>
            
            </div>
        </div>

        <div class="notificaciones">
            <h1>Notificaciones</h1>

            <a href="">
            <div class="notificacionCaja">
                <p>2</p>
                <img src="./assets/images/chatIcon.svg" alt="">
                <h2>Chats</h2>
            </div>
            </a>

            <a href="">
            <div class="notificacionCaja">
                <img src="./assets/images/listIcon.svg" alt="">
                <h2>Mi Servicios</h2>
            </div>
            </a>

            <a href="">
            <div class="notificacionCaja">
                <img src="./assets/images/Starinbox.svg" alt="">
                <h2>Dar Valoraciones</h2>
            </div>
            </a>
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>