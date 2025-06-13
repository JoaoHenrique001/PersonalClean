 document.addEventListener("DOMContentLoaded", function () {
    var btns = document.querySelectorAll('.valoracionButon');
    btns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        var idServicio = this.getAttribute('data-idservicio');
        var idPersona = this.getAttribute('data-idpersona');
        var nombrePersona = this.getAttribute('data-nombrepersona');
        document.getElementById('popup_idServicio').value = idServicio;
        document.getElementById('popup_idPersona').value = idPersona;
        document.getElementById('popup_nombrePersona').innerText = nombrePersona;
        document.getElementById('popupValoracion').style.display = 'flex';
      });
    });
    document.getElementById('popup_cancelar').addEventListener('click', function() {
    document.getElementById('popupValoracion').style.display = 'none';
    });})