document.addEventListener("DOMContentLoaded", function () {
    //sistema de agregar ciudads dependendo de la provincia
    let Madrid = ["Ajalvir",
        "Alameda del Valle",
        "Álamo, El",
        "Alcalá de Henares",
        "Alcobendas",
        "Alcorcón",
        "Aldea del Fresno",
        "Algete",
        "Alpedrete",
        "Ambite",
        "Anchuelo",
        "Aranjuez",
        "Arganda del Rey",
        "Arroyomolinos",
        "Atazar, El",
        "Batres",
        "Becerril de la Sierra",
        "Belmonte de Tajo",
        "Berrueco, El",
        "Berzosa del Lozoya",
        "Boalo, El",
        "Braojos",
        "Brea de Tajo",
        "Brunete",
        "Buitrago del Lozoya",
        "Bustarviejo",
        "Cabanillas de la Sierra",
        "Cabrera, La",
        "Cadalso de los Vidrios",
        "Camarma de Esteruelas",
        "Campo Real",
        "Canencia",
        "Carabaña",
        "Casarrubuelos",
        "Cenicientos",
        "Cercedilla",
        "Cervera de Buitrago",
        "Chapinería",
        "Chinchón",
        "Ciempozuelos",
        "Cobeña",
        "Collado Mediano",
        "Collado Villalba",
        "Colmenar de Oreja",
        "Colmenar del Arroyo",
        "Colmenar Viejo",
        "Colmenarejo",
        "Corpa",
        "Coslada",
        "Cubas de la Sagra",
        "Daganzo de Arriba",
        "Escorial, El",
        "Estremera",
        "Fresnedillas de la Oliva",
        "Fresno de Torote",
        "Fuenlabrada",
        "Fuente el Saz de Jarama",
        "Fuentidueña de Tajo",
        "Galapagar",
        "Garganta de los Montes",
        "Gargantilla del Lozoya y Pinilla de Buitrago",
        "Gascones",
        "Getafe",
        "Griñón",
        "Guadalix de la Sierra",
        "Guadarrama",
        "Hiruela, La",
        "Horcajo de la Sierra-Aoslos",
        "Horcajuelo de la Sierra",
        "Hoyo de Manzanares",
        "Humanes de Madrid",
        "Leganés",
        "Loeches",
        "Los Molinos",
        "Los Santos de la Humosa",
        "Lozoya",
        "Lozoyuela-Navas-Sieteiglesias",
        "Madarcos",
        "Madrid",
        "Majadahonda",
        "Manzanares el Real",
        "Meco",
        "Mejorada del Campo",
        "Miraflores de la Sierra",
        "Molar, El",
        "Molinos, Los",
        "Montejo de la Sierra",
        "Moraleja de Enmedio",
        "Moralzarzal",
        "Morata de Tajuña",
        "Móstoles",
        "Navacerrada",
        "Navalafuente",
        "Navalagamella",
        "Navalcarnero",
        "Navarredonda y San Mamés",
        "Navas del Rey",
        "Nuevo Baztán",
        "Olmeda de las Fuentes",
        "Orusco de Tajuña",
        "Paracuellos de Jarama",
        "Parla",
        "Patones",
        "Pedrezuela",
        "Pelayos de la Presa",
        "Perales de Tajuña",
        "Pezuela de las Torres",
        "Pinilla del Valle",
        "Pinto",
        "Piñuécar-Gandullas",
        "Pozuelo de Alarcón",
        "Pozuelo del Rey",
        "Prádena del Rincón",
        "Puebla de la Sierra",
        "Puentes Viejas",
        "Quijorna",
        "Rascafría",
        "Redueña",
        "Ribatejada",
        "Rivas-Vaciamadrid",
        "Robledillo de la Jara",
        "Robledo de Chavela",
        "Robregordo",
        "Rozas de Madrid, Las",
        "Rozas de Puerto Real",
        "San Agustín del Guadalix",
        "San Fernando de Henares",
        "San Lorenzo de El Escorial",
        "San Martín de la Vega",
        "San Martín de Valdeiglesias",
        "San Sebastián de los Reyes",
        "Santa María de la Alameda",
        "Santorcaz",
        "Santos de la Humosa, Los",
        "Serna del Monte, La",
        "Serranillos del Valle",
        "Sevilla la Nueva",
        "Somosierra",
        "Soto del Real",
        "Talamanca de Jarama",
        "Tielmes",
        "Titulcia",
        "Torrejón de Ardoz",
        "Torrejón de la Calzada",
        "Torrejón de Velasco",
        "Torrelaguna",
        "Torrelodones",
        "Torremocha de Jarama",
        "Torres de la Alameda",
        "Tres Cantos",
        "Valdaracete",
        "Valdeavero",
        "Valdelaguna",
        "Valdemanco",
        "Valdemaqueda",
        "Valdemorillo",
        "Valdemoro",
        "Valdeolmos-Alalpardo",
        "Valdepiélagos",
        "Valdetorres de Jarama",
        "Valdilecha",
        "Valverde de Alcalá",
        "Velilla de San Antonio",
        "Vellón, El",
        "Venturada",
        "Villa del Prado",
        "Villaconejos",
        "Villalbilla",
        "Villamanrique de Tajo",
        "Villamanta",
        "Villamantilla",
        "Villanueva de la Cañada",
        "Villanueva de Perales",
        "Villanueva del Pardillo",
        "Villar del Olmo",
        "Villarejo de Salvanés",
        "Villaviciosa de Odón",
        "Villavieja del Lozoya",
        "Zarzalejo"];
    let ciudadCampo = document.getElementById("ciudad");
    let provinciaCampo = document.getElementById("provincia");
    // Llenar el select con las ciudades
    provinciaCampo.addEventListener("change" , () => {
        if(provinciaCampo.value == "Madrid"){
            for (let i = 0; i < Madrid.length; i++) {
              const option = document.createElement("option");
              option.value = Madrid[i];
              option.textContent = Madrid[i];
              ciudadCampo.appendChild(option);
            }}else {
                ciudadCampo.innerHTML = '<option value="">Ciudad</option>';
            }
    })

    const formulario = document.getElementById("formRegistro");

    //sistema verificar campos usuario
    let nombre = document.getElementById("nombreInput");
    let apellidos = document.getElementById("apellidoInput");
    let email = document.getElementById("emailInput");
    let contraseña = document.getElementById("contraseñaInput");
    let confContraseña = document.getElementById("confcontraseñaInput");
    let numeroTel = document.getElementById("numTelefono");
    let fnacimiento = document.getElementById("fnacimiento");
    let tipoUsuario = document.getElementById("tipoUsuario");
    let provincia = document.getElementById("provincia");
    let ciudad = document.getElementById("ciudad");
    let codigoPostal = document.getElementById("cp");
    let direccion = document.getElementById("direccion");

    let Mnombre = document.getElementById("nombreSpan");
    let Memail = document.getElementById("emailSpan");
    let Mcontra = document.getElementById("contraSpan");
    let MconfContra = document.getElementById("confcontraSpan");
    let Mtelefono = document.getElementById("numTelefonoSpan");
    let MfNacimiento = document.getElementById("fnacSpan");
    let Mcp = document.getElementById("cpSpan");
    let Mdireccion = document.getElementById("direcSpan");
    let MtipoUsuario = document.getElementById("tipoSpan");
    let Mprov = document.getElementById("proviSpan");
    let Mciudad = document.getElementById("ciudadSpan");
    
    //expresiones regulares necesarias
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const telefonoRegex = /^[6-9]\d*$/; 
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    const cpRegex = /^(?:0[1-9]|[1-4][0-9]|5[0-2])\d{3}$/;

    // funciones de verificacion
    function validarNombre() {
      const nombreVacio = nombre.value.trim() === "";
      const apellidoVacio = apellidos.value.trim() === "";
    
      if (nombreVacio && apellidoVacio) {
        nombre.classList.add("errorInput");
        apellidos.classList.add("errorInput");
        Mnombre.textContent = "No puedes dejar los campos vacíos.";
        Mnombre.classList.add("errorSpan");
        return false;
      }
    
      nombre.classList.toggle("errorInput", nombreVacio);
      apellidos.classList.toggle("errorInput", apellidoVacio);
    
      if (nombreVacio || apellidoVacio) {
        Mnombre.textContent = "Debe completar ambos campos o dejar ambos vacíos.";
        Mnombre.classList.add("errorSpan");
        return false;
      }
    
      Mnombre.textContent = "";
      Mnombre.classList.remove("errorSpan");
      return true;
    }
    
    function validarEmail() {
      const esValido = emailRegex.test(email.value.trim());
    
      email.classList.toggle("errorInput", !esValido);
      Memail.textContent = esValido ? "" : "Correo inválido.";
      Memail.classList.toggle("errorSpan", !esValido);
    
      return esValido;
    }

    function validarContraseña() {
      const esValida = passwordRegex.test(contraseña.value);
    
      contraseña.classList.toggle("errorInput", !esValida);
      Mcontra.textContent = esValida ? "" : "Debe tener al menos una mayúscula, una minúscula y un número.";
      Mcontra.classList.toggle("errorSpan", !esValida);
    
      return esValida;
    }
      
    function validarConfContraseña() {
      const esValida = confContraseña.value === contraseña.value && confContraseña.value.trim() !== "";
    
      confContraseña.classList.toggle("errorInput", !esValida);
      MconfContra.textContent = esValida ? "" : "Las contraseñas no coinciden.";
      MconfContra.classList.toggle("errorSpan", !esValida);
    
      return esValida;
    }

    
    function validarTelefono() {
      // Dejar solo los números
      numeroTel.value = numeroTel.value.replace(/\D/g, '');

      // Validar usando el regex
      const esValido = telefonoRegex.test(numeroTel.value);

      // Aplicar clases de error o limpiar mensajes
      numeroTel.classList.toggle("errorInput", !esValido);
      Mtelefono.textContent = esValido ? "" : "El teléfono debe empezar con 6, 7, 8 o 9 y contener solo números.";
      Mtelefono.classList.toggle("errorSpan", !esValido);

      return esValido;
    }
    
    function validarFechaNacimiento() {
        const fechaNacimiento = new Date(fnacimiento.value);
        const hoy = new Date();
        const edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        const mes = hoy.getMonth() - fechaNacimiento.getMonth();
        const dia = hoy.getDate() - fechaNacimiento.getDate();
      
        if (fnacimiento.value === "") {
          fnacimiento.classList.add("errorInput");
          MfNacimiento.textContent = "Debe ingresar su fecha de nacimiento.";
          MfNacimiento.classList.add("errorSpan");
          return false;
        }
      
        if (mes < 0 || (mes === 0 && dia < 0)) {
          edad--;
        }
      
        if (edad < 18) {
          fnacimiento.classList.add("errorInput");
          MfNacimiento.textContent = "Debe ser mayor de 18 años para registrarse.";
          MfNacimiento.classList.add("errorSpan");
          return false;
        } else {
          fnacimiento.classList.remove("errorInput");
          MfNacimiento.textContent = "";
          MfNacimiento.classList.remove("errorSpan");
          return true;
        }
    }     
    function transformarFecha(fecha) {
      // Separar la fecha original por "/"
      var partes = fecha.split("/");
    
      if (partes.length !== 3) {
        return "Formato inválido";
      }
    
      var dia = partes[0];
      var mes = partes[1];
      var anio = partes[2];
    
      // Retornar en el nuevo formato
      return anio + "/" + mes + "/" + dia;
    }

    function validarCP() {
        if (!cpRegex.test(codigoPostal.value)) {
          codigoPostal.classList.add("errorInput");
          Mcp.textContent = "Debe ingresar su codigo postal.";
          Mcp.classList.add("errorSpan");
          return false;
        } else {
          codigoPostal.classList.remove("errorInput");
          Mcp.textContent = "";
          Mcp.classList.remove("errorSpan");
          return true;
        }
    }

    function validarDireccion() {
        if (direccion.value === "") {
          direccion.classList.add("errorInput");
          Mdireccion.textContent = "Debe ingresar su direccion.";
          Mdireccion.classList.add("errorSpan");
          return true;
        } else {
          codigoPostal.classList.remove("errorInput");
          Mdireccion.textContent = "";
          Mdireccion.classList.remove("errorSpan");
          return false;
        }
    }

    function validarTipoUsuario() {
        const esValido = tipoUsuario.value !== "Tipo de Usuario";
      
        tipoUsuario.classList.toggle("errorInput", !esValido);
        MtipoUsuario.textContent = esValido ? "" : "Debe seleccionar un tipo de usuario válido.";
        MtipoUsuario.classList.toggle("errorSpan", !esValido);
      
        return esValido;
    }

    function validarProvincia() {
        const esValido = provincia.value !== "Provincia";
      
        provincia.classList.toggle("errorInput", !esValido);
        Mprov.textContent = esValido ? "" : "Debe seleccionar una provincia válida.";
        Mprov.classList.toggle("errorSpan", !esValido);
      
        return esValido;
    }

    function validarCiudad() {
        const esValido = ciudad.value !== "Ciudad";
      
        ciudad.classList.toggle("errorInput", !esValido);
        Mciudad.textContent = esValido ? "" : "Debe seleccionar una ciudad válida.";
        Mciudad.classList.toggle("errorSpan", !esValido);
      
        return esValido;
    }

      // eventos vinculados al elemento
      nombre.addEventListener("blur", validarNombre);
      apellidos.addEventListener("blur", validarNombre)
      email.addEventListener("blur", validarEmail);
      contraseña.addEventListener("blur", validarContraseña);
      confContraseña.addEventListener("blur", validarConfContraseña);
      numeroTel.addEventListener("blur", validarTelefono);
  
      fnacimiento.addEventListener("blur", validarFechaNacimiento);
      codigoPostal.addEventListener("blur", validarCP);
      direccion.addEventListener("blur", validarDireccion);
      
      tipoUsuario.addEventListener("blur", validarTipoUsuario);
      provincia.addEventListener("blur", validarProvincia);
      ciudad.addEventListener("blur", validarCiudad);

      formulario.addEventListener("submit", enviarFormulario);

      // envio final
      function enviarFormulario(event) {
        event.preventDefault();
        const validaciones = [
          validarNombre(),
          validarEmail(),
          validarContraseña(),
          validarConfContraseña(),
          validarTelefono(),
          validarTipoUsuario(),
          validarProvincia(),
          validarCiudad()
        ];
      
        const todoValido = validaciones.every(valor => valor === true);
      
        if (!todoValido) {
          event.preventDefault();
        }else{
          event.preventDefault();
        }
          
      }

  });