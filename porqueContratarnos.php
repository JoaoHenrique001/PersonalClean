<?php
session_start(); 

$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porque Contractarnos | Personal Clean</title>

    <!--inicio framework CSS y Js de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!--fin framework CSS y Js de Bootstrap-->

    <!--inicio framework CSS y Js de AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--fin framework CSS y Js de AOS-->

    <!--inicio framework fontawesome-->
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <!--fin framework fontawesome-->

    <!--enlace de css-->
    <link rel="stylesheet" href="./assets/estilos.css?v=123">
    <!--enlace de css-->

    <!--enlace de script.js-->
    <script src="./assets/js/modoOscuro.js"></script>
    <!--enlace de script.js-->

    <!--inicio logo de la pagina ventana-->
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <!--fin logo de la pagina ventana-->
</head>
<body>

 <!-- inicio Cabecera dinámica -->
  <?php
    if ($usuarioLogueado) {
      include_once './assets/headerLogueado.php';
    } else {
      include_once './assets/header.php';
    }
  ?>
  <!--fin Cabecera dinámica -->

    <!--inicio migas de pan-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">¿Por que Contractarnos?</li>
    </ol>
    </nav>
    <!--fin migas de pan-->

    <!--inicio Main-->
      <div class="sobreNosotros">
        <div class="contenido-sobreNosotros">
        <img src="./assets/images/pqContractarnos.png" alt="">

        <p class="sobreTexto"> En <strong>Personal Clean</strong>, no solo limpiamos espacios, <em>transformamos ambientes</em>. Nuestro objetivo es que cada cliente sienta la tranquilidad de estar en un lugar <span class="destacado">limpio, seguro y acogedor</span>. </p>
        <p class="sobreTexto"> ¿Por qué elegirnos? Porque ofrecemos mucho más que un servicio: brindamos <strong>resultados visibles</strong>, <strong>trato humano</strong> y <strong>soluciones personalizadas</strong>, adaptadas a tus necesidades reales. </p>
        <p class="sobreTexto"> Nuestro equipo está formado por profesionales <span class="destacado">entrenados, responsables y apasionados</span> por lo que hacen. Trabajamos con <strong>productos certificados</strong> y aplicamos <em>técnicas actuales</em> que garantizan una limpieza eficiente y respetuosa con tu entorno. </p>
        <p class="sobreTexto"> Cada detalle importa. Por eso, nos enfocamos en ofrecer un servicio que combine <strong>eficacia, confianza y cercanía</strong>. Nos esforzamos para que cada experiencia con Personal Clean sea <span class="destacado">satisfactoria y libre de preocupaciones</span>. </p>
        <p class="sobreTexto"> Puntualidad, compromiso y transparencia son pilares que nos definen. <strong>Nos tomamos tu tiempo en serio</strong> y cuidamos cada espacio como si fuera nuestro. </p> <p class="sobreTexto"> <strong>Elegir Personal Clean</strong> es optar por una empresa que entiende que la limpieza va más allá del orden: es bienestar, salud y calidad de vida. <span class="destacado">Confía en nosotros y descubre cómo podemos hacer la diferencia en tu día a día.</span> </p>
        </div>
      </div>
    <!--fin Main-->

    <!--inicio footer-->
    <?php
    include_once './assets/footer.php'
    ?>
    <!--fin footer-->
 
</body>
    <!--inicio framework CSS y Js de AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <!--fin framework CSS y Js de AOS-->
</html>