document.addEventListener('DOMContentLoaded', function () {
    const chk = document.getElementById('chk');
    //aplicar el modo guardado al cargar la página
    const modoGuardado = localStorage.getItem('modo');
    if (modoGuardado === 'oscuro') {
        chk.checked = true;
        activarModoOscuro();
    }

    // Evento para cambiar el modo
    chk.addEventListener('change', () => {
        const isDark = chk.checked;

        if (isDark) {
            activarModoOscuro();
            localStorage.setItem('modo', 'oscuro');
        } else {
            desactivarModoOscuro();
            localStorage.setItem('modo', 'claro');
        }
    });

    function activarModoOscuro() {
        document.body.classList.add('dark');
        document.documentElement.classList.add('dark-scrollbar');

        const header = document.querySelector('header');
        if (header) header.classList.add('dark');

        const breadcrumb = document.querySelector('.breadcrumb');
        if (breadcrumb) breadcrumb.classList.add('dark');

        const contacto = document.querySelector('#contacto');
        if (contacto) contacto.classList.add('dark');

        const frase = document.querySelector('#frase');
        if (frase) frase.classList.add('dark');

        document.querySelectorAll('#BotoTel').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.accordion-button').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.GrupoBotonesHeader > ul > li > a').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('#bottonHeader').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('#faqAcord').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('#faqCuerpo').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.servicioCampo').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.cajaForm').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.form-content input').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('#Mensaje').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('#SelectServ').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.espacioContacto1 > p').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.formEnter > input').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.formEnter').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.formEnter > p > a').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.nombreCompleto > input').forEach(input => {input.classList.add('dark');});
        document.querySelectorAll('.preAd').forEach(el => el.classList.add('dark'));
        document.querySelectorAll('.logout > h1').forEach(el => el.classList.add('dark'));
        ['#provincia', '#ciudad', '#tipoUsuario'].forEach(selector => {const el = document.querySelector(selector);if (el) el.classList.add('dark');});
    }

    function desactivarModoOscuro() {
        document.body.classList.remove('dark');
        document.documentElement.classList.remove('dark-scrollbar');

        const header = document.querySelector('header');
        if (header) header.classList.remove('dark');

        const breadcrumb = document.querySelector('.breadcrumb');
        if (breadcrumb) breadcrumb.classList.remove('dark');

        const contacto = document.querySelector('#contacto');
        if (contacto) contacto.classList.remove('dark');

        const frase = document.querySelector('#frase');
        if (frase) frase.classList.remove('dark');

        document.querySelectorAll('#BotoTel').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.accordion-button').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.GrupoBotonesHeader > ul > li > a').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('#bottonHeader').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('#faqAcord').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('#faqCuerpo').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.servicioCampo').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.cajaForm').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.form-content input').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('#Mensaje').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('#SelectServ').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.espacioContacto1 > p').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.formEnter > input').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.formEnter').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.formEnter > p > a').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.nombreCompleto > input').forEach(input => {input.classList.remove('dark');});
        document.querySelectorAll('.preAd').forEach(el => el.classList.remove('dark'));
        document.querySelectorAll('.logout > h1').forEach(el => el.classList.remove('dark'));
        ['#provincia', '#ciudad', '#tipoUsuario'].forEach(selector => {const el = document.querySelector(selector);if (el) el.classList.remove('dark');});
    }
});
//fin logica para cambio de modo oscuro y claro


/*inicio logica para enseñar barra de navegacion telefono*/
    function toggleAccordion() {
      accordionTel.classList.toggle('show');
      const exeElement = document.getElementById('exe');
      const BarsElement = document.getElementById('bars');
      if (accordionTel.classList.contains('show')) {
        exeElement.style.display = 'block';
        BarsElement.style.display = 'none';
      } else {
        exeElement.style.display = 'none';
        BarsElement.style.display = 'block';
      }
    }
/*fin logica para enseñar barra de navegacion telefono*/