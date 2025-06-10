<?php
session_start();

if(isset($_SESSION['usuario']['tipo'])){
if ($_SESSION['usuario']['tipo'] == 'administradores') {
    header("Location: logout.php");
    exit;
}}
// Verificar si el usuario está logueado (puedes adaptar la condición si usas otro nombre)
$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Inicial | Personal Clean</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/estilos.css">
  <script src="./assets/js/modoOscuro.js"></script>
  <link rel="icon" type="image/ico" href="/assets/images/logo.ico">
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
    <li class="breadcrumb-item active" aria-current="page"><img src="./assets/images/house.svg" alt=""></li>
    </ol>
    </nav>
    <!--fin migas de pan-->

    <!--inicio Main-->

    <!--inicio div principal-->
    <div id="principal">
      <div id="titulo">
          <h1>!Disfruta de tu hogar recién limpio!</h1>
          <p><span>Personal Clean</span> se encarga de las tareas del hogar y del cuidado de tus seres queridos, brindándote la libertad de disfrutar plenamente de tu tiempo libre.</p>
          <a class="nav-link" href="#cn">
          <button class="contactar">
          <span>Contactar</span>
          </button>
          </a>
      </div>
    </div>
    <!--fin div principal-->

    <!--inicio servicios Div-->
    <?php
    include_once './assets/servdiv.php';
    ?>
    <!--fin servicios Div-->

<!--inicio frase llamativa-->
  <div id="fraseDiv">
    <div data-aos-duration="1000" data-aos-delay="100" data-aos="flip-left" id="frase" data-aos-once="true">
      <h1>Relájate</h1>
      <p>respira y deja que Personal Clean se encargue del resto.</p>
    </div>
    <div data-aos-duration="1000" data-aos-delay="100" data-aos="fade-left"  id="imgFrase" data-aos-once="true">
      <img src="./assets/images/relajar.jpg" alt="">
    </div>
  </div>
<!--fin frase llamativa-->

<!--inicio contacta con nosostros-->
<div class="cn">
    <!--inicio titulo contacta con nosostros-->
    <div id="cn">
      <h1>Contacta con nosostros</h1>
    </div>
    <!--fin titulo contacta con nosostros-->

<!--inicio contactar-->
    <?php
    include_once './assets/formulario_contacto.php';
    ?>
<!--fin contactar-->

<!--fin titulo contacta con nosostros-->

<!--inicio espacio preguntas frecuentes-->
  <div id="pregutasFrecuentes">
    <!--inicio titulo preguntas frecuentes-->
    <div id="faq">
      <h1>Preguntas Frecuentes</h1>
    </div>
    <!--fin titulo preguntas frecuentes-->

    <!--inicio acordeon con las preguntas-->
    <div id="faqAcord">
      <!--inicio acordion 1-->
    <div class="accordion" id="accordionPanelsStayOpenExample" data-aos-duration="1000" data-aos-delay="100" data-aos="fade-left" data-aos-once="true">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
      ¿Qué tipo de servicios de limpieza ofrecemos?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div id="faqCuerpo" class="accordion-body">
      Ofrecemos una amplia gama de servicios de limpieza, que incluyen limpieza residencial, limpieza de oficinas, limpieza profunda, limpieza de ventanas, limpieza de alfombras, y servicios de desinfección. Además, personalizamos nuestros servicios para adaptarnos a las necesidades específicas de cada cliente, asegurándonos de que sus espacios estén siempre limpios y acogedores.
      </div>
    </div>
  </div>
  <!--fin acordion 1-->

  <!--inicio acordion 2-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      ¿Puedo confiar en los empleados que envían a mi hogar?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Sí, todos nuestros empleados pasan por un riguroso proceso de selección que incluye verificaciones de antecedentes y referencias. Además, reciben formación continua para garantizar un servicio de alta calidad y confiabilidad. Su seguridad y satisfacción son nuestras principales preocupaciones.
      </div>
    </div>
  </div>
  <!--fin acordion 2-->

  <!--inicio acordion 3-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
      ¿Qué sucede si no estoy satisfecho con el servicio?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Si no está completamente satisfecho con el servicio recibido, por favor, contáctenos de inmediato. Nos comprometemos a rectificar cualquier problema y a asegurar que quede satisfecho con nuestro trabajo. Ofrecemos una garantía de satisfacción y estamos aquí para solucionar cualquier inconveniente.
      </div>
    </div>
  </div>
  <!--fin acordion 3-->

  <!--inicio acordion 4-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
      ¿Qué servicios de cuidado de niños ofrecen?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Ofrecemos una variedad de servicios de cuidado de niños, incluyendo cuidado a tiempo completo, medio tiempo, cuidado de emergencia, y servicios de niñera para eventos especiales. Nuestros cuidadores están capacitados para proporcionar un ambiente seguro y estimulante para sus hijos, ayudándolos con tareas escolares y actividades recreativas.
      </div>
    </div>
  </div>
  <!--fin acordion 4-->

  <!--inicio acordion 5-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
      ¿Cómo aseguran la seguridad de los niños?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      La seguridad de sus hijos es nuestra máxima prioridad. Realizamos rigurosas verificaciones de antecedentes de todos nuestros cuidadores y mantenemos políticas estrictas de seguridad. Además, implementamos protocolos de emergencia y trabajamos de cerca con los padres para comprender y cumplir con sus expectativas de seguridad.
      </div>
    </div>
  </div>
  <!--fin acordion 5-->

  <!--inicio acordion 6-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
      ¿Puedo conocer al cuidador antes de contratar el servicio?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Sí, entendemos la importancia de la confianza en el cuidado de niños. Ofrecemos reuniones previas para que usted y sus hijos puedan conocer al cuidador asignado y sentirse cómodos antes de comenzar el servicio. Este encuentro ayuda a establecer una relación de confianza y a asegurar una transición sin problemas.
      </div>
    </div>
  </div>
  <!--fin acordion 6-->

  <!--inicio acordion 7-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
      ¿Necesito proporcionar los productos de limpieza?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      No, no es necesario que proporcione los productos de limpieza, pero es una opción disponible para aquellos que prefieran hacerlo. Nuestra empresa se adapta a sus necesidades y preferencias para asegurar su comodidad y satisfacción.
      </div>
    </div>
  </div>
  <!--fin acordion 7-->

  <!--inicio acordion 8-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEigth" aria-expanded="false" aria-controls="panelsStayOpen-collapseEigth">
      ¿Qué pasa si el cuidador asignado no es compatible con mi familiar?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseEigth" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Nos esforzamos por asignar cuidadores que se ajusten bien a las necesidades y preferencias de su familiar, pero en ocasiones puede ser necesario realizar ajustes. Si encuentra que el cuidador asignado no es compatible, estamos comprometidos a trabajar con usted para encontrar una solución satisfactoria.
      </div>
    </div>
  </div>
  <!--fin acordion 8-->

  <!--inicio acordion 9-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
      ¿Puedo ajustar el horario del cuidador según las necesidades cambiantes?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      Sí, ofrecemos flexibilidad para ajustar los horarios según las necesidades cambiantes de nuestros clientes. Ya sea que necesite aumentar las horas de servicio o modificar el horario existente, trabajaremos con usted para asegurar que sus necesidades sean cubiertas de manera eficiente.
      </div>
    </div>
  </div>
  <!--fin acordion 9-->

  <!--inicio acordion 10-->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
      ¿Necesito estar en casa durante mi cita?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse">
      <div id="faqCuerpo" class="accordion-body">
      La decisión de estar en casa durante su cita es completamente suya y depende de sus preferencias y nivel de comodidad. Entendemos que cada cliente tiene diferentes necesidades y circunstancias, por lo que ofrecemos opciones flexibles para adaptarnos a usted.
      </div>
    </div>
  </div>
  <!--fin acordion 10-->
</div>
    </div>
    <!--fin acordeon con las preguntas-->
  </div>
<!--fin espacio preguntas frecuentes-->

    <!--fin Main-->

    <!--inicio footer-->
    <?php
    include_once './assets/footer.php';
    ?>
    <!--fin footer-->
 
</body>
    <!--inicio framework CSS y Js de AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <!--fin framework CSS y Js de AOS-->
</html>

