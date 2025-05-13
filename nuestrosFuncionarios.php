<?php
session_start(); 

$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Funcionarios | Personal Clean</title>

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
    <link rel="stylesheet" href="./assets/estilos.css">
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
    <li class="breadcrumb-item">Nuestros Funcionarios</li>
    </ol>
    </nav>
    <!--fin migas de pan-->

    <!--inicio Main-->
      <div class="sobreNosotros">
        <div class="contenido-sobreNosotros">
        <img src="./assets/images/clientebuscandFuncionario.png" alt="">

        <p class="sobreTexto"> En <strong>Personal Clean</strong>, facilitamos la búsqueda de personal calificado para limpieza y mantenimiento de espacios. Nuestro sistema está diseñado para ser <span class="destacado">rápido, seguro y personalizado</span>. </p> <p class="sobreTexto"> Sigue estos pasos para encontrar al funcionario ideal: </p> <ol class="sobreTexto"> <li><strong>Crea tu cuenta</strong> como cliente en nuestro sistema.</li> <li>Accede a la sección <em>"Crear Servicio"</em> e ingresa los detalles del servicio que necesitas.</li> <li>Los funcionarios disponibles podrán <strong>postularse</strong> a tu oferta.</li> <li>Revisa los perfiles, experiencias y valoraciones de los candidatos.</li> <li>Selecciona al funcionario que más se ajuste a tus necesidades y confirma el servicio.</li> </ol> <p class="sobreTexto"> También puedes navegar por la <strong>lista de funcionarios disponibles</strong> y contratarlos directamente si alguno cumple con tus expectativas. </p> <p class="sobreTexto"> Con <em>Personal Clean</em>, contratar servicios confiables es simple y transparente. </p>
        </div>
      </div>
    <!--fin Main-->

    
 
</body>
    <!--inicio framework CSS y Js de AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <!--fin framework CSS y Js de AOS-->
</html>