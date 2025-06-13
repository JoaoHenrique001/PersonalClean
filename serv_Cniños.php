<?php
session_start();

$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidado de niños | Personal Clean</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/estilos.css">

    <script src="./assets/js/modoOscuro.js"></script>

    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
</head>
<body>

  <?php
    if ($usuarioLogueado) {
      include_once './assets/headerLogueado.php';
    } else {
      include_once './assets/header.php';
    }
  ?>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">Servicio cuidado de niños</li>
    </ol>
    </nav>

        <div class="servicioCampo">
            <div class="servicioDesc">
                <h1><strong>Personal Clean</strong> Cuidado de niños</h1>
                <p><strong>Personal Clean</strong> te ofrece un servicio de cuidado de niños que se adapta a las necesidades de tu familia. <em>Organizados 100% en línea</em>, garantizamos la selección de cuidadores altamente capacitados y de confianza. <span>Nuestro equipo de profesionales del cuidado infantil</span> está siempre listo para brindarte el mejor servicio. Nuestros servicios son <strong>completamente flexibles y personalizados</strong>, asegurando que cada niño reciba la atención y el cuidado que necesita. Con Personal Clean, puedes estar tranquilo sabiendo que tus hijos están en buenas manos, permitiéndote disfrutar de más tiempo libre <em>sin preocupaciones</em>.</p>
                <a class="nav-link" href="#contmap">
                <button class="contactar">
                <span>Contactar</span>
                </button>
                </a>
            </div>
            <div class="servicioImg">
                <img src="./assets/images/cuidadoNiños.jpg" alt="Cuidado de niños">
            </div>
        </div>

    <?php
    include_once './assets/servdiv.php';
    ?>

    <?php
    include_once './assets/formulario_contacto.php';
    ?>

    <?php
    include_once './assets/footer.php';
    ?>
 
</body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</html>