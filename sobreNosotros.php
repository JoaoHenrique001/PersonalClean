<?php
session_start();

$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidado de mayores | Personal Clean</title>

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
    <li class="breadcrumb-item">Sobre nosotros</li>
    </ol>
    </nav>
    <!--fin migas de pan-->

    <!--inicio Main-->
      <div class="sobreNosotros">
        <div class="contenido-sobreNosotros">
        <img src="./assets/images/personalCleanCartoon.png" alt="">

        <p class="sobreTexto">
  En <strong>Personal Clean</strong>, creemos que la limpieza va más allá de una simple tarea: 
  es un <span class="destacado">compromiso con el bienestar, la comodidad y la tranquilidad</span> de nuestros clientes.
</p>

<p class="sobreTexto">
  Desde nuestros inicios, trabajamos con la misión de ofrecer <strong>servicios de limpieza de alta calidad</strong>, con <span class="destacado">profesionalismo, responsabilidad y dedicación</span>.
</p>

<p class="sobreTexto">
  Contamos con un <strong>equipo capacitado</strong>, con experiencia y comprometido en ofrecer siempre <span class="destacado">los mejores resultados</span>. 
  Utilizamos <strong>productos de calidad</strong> y <em>técnicas modernas</em> para garantizar espacios <span class="destacado">limpios, organizados y saludables</span>, 
  ya sea en hogares, oficinas, empresas o locales comerciales.
</p>

<p class="sobreTexto">
  Nuestro principal valor es el <span class="destacado">cuidado por los detalles</span> y el <span class="destacado">respeto por las necesidades de cada cliente</span>. 
  Valoramos la <strong>confianza</strong> que depositan en nuestro trabajo y buscamos <em>constantemente superar las expectativas</em>, 
  manteniendo un alto estándar de excelencia.
</p>

<p class="sobreTexto">
  Personal Clean actúa con <strong>ética</strong>, <strong>puntualidad</strong> y <strong>seriedad</strong>, priorizando la <span class="destacado">satisfacción total</span> de quienes confían en nosotros.
  Sabemos que un entorno limpio <em>transforma la rutina</em>, <em>mejora la productividad</em> y <strong>aporta calidad de vida</strong>.
</p>

<p class="sobreTexto">
  Por eso, cada servicio se realiza con <span class="destacado">esmero, atención y compromiso</span>. 
  <strong>Más que una empresa de limpieza, somos tu aliado en el cuidado de tu espacio.</strong>
</p>
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