<?php
session_start(); 

$usuarioLogueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas de Empleo | Personal Clean</title>

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
    <script src="./assets/js/edit.js"></script>
    <!--enlace de script.js-->

    <!--inicio logo de la pagina ventana-->
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <!--fin logo de la pagina ventana-->
</head>
<body>

 <!-- inicio Cabecera dinámica -->
  <?php include_once './assets/headerLogueado.php'; ?>
  <!--fin Cabecera dinámica -->

    <!--inicio migas de pan-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">NOMBRE usuario</li>
    <li class="breadcrumb-item">Edicion Perfil</li>
    </ol>
    </nav>
    <!--fin migas de pan-->

   <div class="edicionArea">
    <form class="edicionForm"  method="POST">
    <div class="apartado1 campos">
        <img src="./assets/images/userIcon.svg" alt="">
        <button>Cambiar</button>

        <label class="labeledit" for="">Nombre:</label>
        <input type="text" value="" name="nombre" class="campoedit">

        <label class="labeledit" for="">Apellido:</label>
        <input type="text" value="" name="apellido" class="campoedit">

        <label class="labeledit" for="">Email:</label>
        <input type="text" value="" name="email" class="campoedit">
    </div>

    <div class="apartado2 campos">
        <label class="labeledit" for="">Contraseña:</label>
        <input type="text" value="" name="contraseña" class="campoedit" required>

        <label class="labeledit" for="">Teléfono:</label>
        <input type="text" value="" name="telefono" class="campoedit" required>

        <label class="labeledit" for="">Fecha nacimiento:</label>
        <input type="date" value="" name="fnacimiento" class="campoedit" required>

        <label class="labeledit" for="">Dirección:</label>
        <input type="text" value="" name="direccion" class="campoedit" required>

        <label class="labeledit" for="">Provincia:</label>
        <select name="ciudad" class="campoedit" id="provincia" required>
             <option value="">Provincia</option>
             <option value="Madrid">Madrid</option>
        </select>
        
        <label class="labeledit" for="">Ciudad:</label>
        <select name="ciudad" class="campoedit" id="ciudad" required>
            <option value="">Ciudad</option>
        </select>
    </div>

    <div class="apartado3 campos">
        <label class="labeledit" for="">Codigo Postal:</label>
        <input type="text" value="" name="" class="campoedit" required>

        <label class="labeledit" for="">Descripcion:</label>
        <textarea type="text" value="" name="" class="editDescripcion campoedit"></textarea>

        <input type="submit" value="Guardar">
    </div>
    </form>
   </div>

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