<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de instalar PHPMailer con Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $codigoPost = htmlspecialchars($_POST["codigoPost"]);
    $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
    $servicio = htmlspecialchars($_POST["servicioForm"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    if (!$correo) {
        echo "Correo inválido.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.tuempresa.com'; // Cambia al servidor SMTP que uses
        $mail->SMTPAuth = true;
        $mail->Username = 'tuemail@tuempresa.com'; // Tu email de envío
        $mail->Password = 'tu_contraseña'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar destinatario y contenido
        $mail->setFrom('tuemail@tuempresa.com', 'Tu Empresa');
        $mail->addAddress('JH@personalclean.es'); // Email de recepción
        $mail->Subject = 'Nuevo mensaje de contacto';
        
        // Formatear el cuerpo del mensaje
        $mail->Body = "
            Nombre: $nombre $apellido\n
            Código Postal: $codigoPost\n
            Correo: $correo\n
            Servicio Solicitado: $servicio\n
            Mensaje:\n$mensaje\n
        ";

        $mail->send();
        echo "Correo enviado correctamente.";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>


<!--inicio espacio div contacto-->
<div class="contacto" id="contmap">
    <!--inicio espacio ezquierdo de la div de contacto-->
    <div class="espacioContacto1">
        <h1 data-aos-duration="1000" data-aos-delay="100"  data-aos="fade-right" data-aos-once="true">
            Contacta con nosostros
        </h1>
        <p data-aos-duration="1000" data-aos-delay="200"  data-aos="fade-right" data-aos-once="true">Cualquier duda, por favor, rellene el formulario. Le responderemos lo más rápido posible.</p>
        <button data-aos-duration="1000" data-aos-delay="300"  data-aos="fade-right" data-aos-once="true">
            <span>
           Solicitacion de empleo 
            </span>
        </button>
        <img data-aos-duration="1000" data-aos-delay="400"  data-aos="fade-right" src="./assets/images/telefono.jpg" alt="" data-aos-once="true">
    </div>
    <!--fin espacio ezquierdo de la div de contacto-->

    <!--inicio espacio derecho del contacto, el formulario de contacto-->
    <div class="espacioContacto2">
        <!--inicio formulario--> 
        <div class="cajaForm" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400" data-aos-once="true">
    <section class="headerForm">
      <h2>Envio de Correo</h2>
    </section>

    <form id="form" class="form">
      <div class="form-content">
        <input type="text" id="nombre" placeholder="Nombre *">
        <a>Mensaje de error</a>
      </div>

      <div class="form-content">
        <input type="text" id="Apellido" placeholder="Apellido *">
        <a>Mensaje de error</a>
      </div>

      <div class="form-content">
        <input type="text" id="codigoPost" placeholder="codigo postal (Ej:15600) *">
        <a>Mensaje de error</a>
      </div>

      <div class="form-content">
        <input type="text" id="correo" placeholder="Correo Eletronico *">
        <a>Mensaje de error</a>
      </div>
      
      <div class="form-content">
        <select name="ServicioForm" id="SelectServ">
          <option value="">Selecionar Servicio</option>
          <option value="ServDomestico">Servicio Domestico</option>
          <option value="ServLimp">Servicio de Limpieza</option>
          <option value="CuidNiñ">Cuidado de niños</option>
          <option value="CuidMay">Cuidado de mayores</option>
          <option value="Busqueda">Busco Empleo</option>
        </select>
      </div>

      <div class="form-content">
        <textarea name="Mensaje" id="Mensaje" placeholder="(opcional) Nesecita contarnos algo mas? *"></textarea>
      </div>

      <button type="submit">Enviar</button>

    </form>

  </div>
        <!--fin formulario-->
    </div>
    <!--fin espacio derecho del contacto, el formulario de contacto-->
</div>
<!--fin espacio div contacto-->