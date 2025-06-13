<header>
    <div class="cabecera">
     <a href="./index.php"><img id="logoCompleto" src="./assets/images/logoCompleto.png" alt="Logo-PersonalClean">
      <img id="logoParcial" src="./assets/images/personalClean.png" alt="Logo-PersonalClean"></a>
     <nav>
         <div class="GrupoBotonesHeader">
             <button id="bottonHeader" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
               Sobre Personal Clean
             </button>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="../sobreNosotros.php">Sobre Nosotros</a></li>
               <li><a class="dropdown-item" href="../porqueContratarnos.php">¿Por qué contratarnos?</a></li>
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

   <?php
   include './assets/switchModoClaroOscuro.php';
   ?>

    <div class="logReg">
      <a href="../login.php"><button>Log-in</button></a>
      <a href="../registro.php"><button>Registro</button></a>
    </div>
    
<div onclick="toggleAccordion()" class="colapsar">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i onclick="toggleAccordion()" id="bars" class="fas fa-bars"></i>
      <i onclick="toggleAccordion()" id="exe" class="fa fa-times"></i>
    </label>
    </div>
 </header>

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
    <div class="logregTel">
      <a href="../login.php"><button>Log-in</button></a>
      <a href="../registro.php"><button>Registro</button></a>
    </div>
</div>
 