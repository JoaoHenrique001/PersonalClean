<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<header>
  <!--inicio div cabecera desktop-->
    <div class="cabecera">
     <a href="./index.php"><img id="logoCompleto" src="./assets/images/logoCompleto.png" alt="">
                                       <img id="logoParcial" src="./assets/images/personalClean.png" alt=""></a>
     <nav>
         <div class="GrupoBotonesHeader">
             <button id="bottonHeader" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
               Sobre Personal Clean
             </button>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="../sobreNosotros.php">Sobre Nosotros</a></li>
               <li><a class="dropdown-item" href="../porqueContractarnos.php">Por qué contratarnos</a></li>
             </ul>
             <button id="bottonHeader" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                 Servicios
               </button>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="./serv_domestico.php">Servicio doméstico</a></li>
                 <li><a class="dropdown-item" href="./serv_limpieza.php">Servicio de limpieza</a></li>
                 <li><a class="dropdown-item" href="./serv_Cniños.php">Cuidado de niños</a></li>
                 <li><a class="dropdown-item" href="./serv_Cmayores.php">Cuidado de Mayores</a></li>
               </ul>
               <button id="bottonHeader" type="button" class="btn" aria-expanded="false">
                 <a id="contacto" href="../contacto.php">Contacto</a>
               </button>
               <button id="bottonHeader" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                Trabaje con nosotros
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../nuestrosFuncionarios.php">Nuestros funcionarios</a></li>
                <li><a class="dropdown-item" href="../ofertasDeEmpleo.php">Ofertas de Empleo</a></li>
              </ul>
           </div>
     </nav>
    <div class="switchCO" id="varCO">
      <input type="checkbox" class="checkbox" id="chk"/>
      <label class="modoCO" for="chk">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
      </label>
    </div>

    <div class="dropdown">
      <div class="areaUsuario" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="./assets/images/userIcon.svg" alt="Icono usuario" >
      </div>
      <ul class="dropdown-menu dropdown-menu-end user-dropdown">
        <?php if ($_SESSION['usuario']['tipo'] === 'clientes'): ?>
        <li><a class="dropdown-item" href="../area_clientes.php">Area Principal</a></li>
        <?php elseif ($_SESSION['usuario']['tipo'] === 'funcionarios'): ?>
        <li><a class="dropdown-item" href="../area_funcionarios.php">Area Principal</a></li>
        <?php endif; ?>
        <li><a class="dropdown-item" href="./edicionPerfil.php">Editar perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="./logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
    <!--fin div cabecera desktop-->

<div onclick="toggleAccordion()" class="colapsar">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i onclick="toggleAccordion()" id="bars" class="fas fa-bars"></i>
      <i onclick="toggleAccordion()" id="exe" class="fa fa-times"></i>
    </label>
    </div>
 </header>

 <!--inicio barra de navegacion Telefono-->
 <div class="accordion accordion-flush" id="accordionTel">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Sobre Personal Clean
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionTel">
      <div id="BotoTel" class="accordion-body">
      <a class="dropdown-item" href="../sobreNosotros.php">Sobre Nosotros</a>
      <a class="dropdown-item" href="../porqueContratarnos.php">Por qué contratarnos</a>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Servicios
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionTel">
      <div id="BotoTel" class="accordion-body">
      <a class="dropdown-item" href="../serv_domestico.php">Servicio domestico</a>
      <a class="dropdown-item" href="../serv_limpieza.php">Servicio de limpieza</a>
      <a class="dropdown-item" href="../serv_Cniños.php">Cuidado de niños</a>
      <a class="dropdown-item" href="../serv_Cmayores.php">Cuidado de Mayores</a>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Trabaje con nosotros
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionTel">
      <div id="BotoTel" class="accordion-body">
       <a class="dropdown-item" href="../nuestrosFuncionarios.php">Nuestros funcionarios</a>
      <a class="dropdown-item" href="../ofertasDeEmpleo.php">Ofertas de Empleo</a>
      <a class="dropdown-item" href="../contacto.php">Contacto</a>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingUsuario">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUsuario" aria-expanded="false" aria-controls="collapseUsuario">
        Mi cuenta
      </button>
    </h2>
    <div id="collapseUsuario" class="accordion-collapse collapse" aria-labelledby="headingUsuario" data-bs-parent="#accordionTel">
      <div class="accordion-body">
        <?php if ($_SESSION['usuario']['tipo'] === 'clientes'): ?>
          <a class="dropdown-item" href="../area_clientes.php">Área Principal</a>
        <?php elseif ($_SESSION['usuario']['tipo'] === 'funcionarios'): ?>
          <a class="dropdown-item" href="../area_funcionarios.php">Área Principal</a>
        <?php endif; ?>
        <a class="dropdown-item" href="./edicionPerfil.php">Editar perfil</a>
        <hr class="dropdown-divider">
        <a class="dropdown-item text-danger" href="./logout.php">Cerrar sesión</a>
      </div>
    </div>
  </div>
</div>
  <!--fin barra de navegacion Telefono-->
 