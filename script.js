//inicio logica para cambio de modo oscuro y claro
document.addEventListener('DOMContentLoaded', function() {
    const chk = document.getElementById('chk');

    chk.addEventListener('change', () => {
        document.body.classList.toggle('dark');

        const header = document.querySelector('header');
        if (header) {
            header.classList.toggle('dark');
        }

        const breadcrumb = document.querySelector('.breadcrumb');
        if (breadcrumb) {
            breadcrumb.classList.toggle('dark');
        }

        const contacto = document.querySelector('#contacto');
        if (contacto) {
            contacto.classList.toggle('dark');
        }

        document.documentElement.classList.toggle('dark-scrollbar');

        const frase = document.querySelector('#frase');
        if (frase) {
            frase.classList.toggle('dark');
        }

        document.querySelectorAll('#BotoTel').forEach(function(rope) {
            rope.classList.toggle('dark');
        });

        document.querySelectorAll('.accordion-button').forEach(function(rope1) {
            rope1.classList.toggle('dark');
        });

        document.querySelectorAll('.GrupoBotonesHeader > ul > li > a').forEach(function(rope2) {
            rope2.classList.toggle('dark');
        });

        document.querySelectorAll('#bottonHeader').forEach(function(rope3) {
            rope3.classList.toggle('dark');
        });

        document.querySelectorAll('#faqAcord').forEach(function(rope4) {
            rope4.classList.toggle('dark');
        });

        document.querySelectorAll('#faqCuerpo').forEach(function(rope5) {
            rope5.classList.toggle('dark');
        });

        document.querySelectorAll('.servicioCampo').forEach(function(rope6) {
            rope6.classList.toggle('dark');
        });

        document.querySelectorAll('.cajaForm').forEach(function(rope7) {
            rope7.classList.toggle('dark');
        });

        document.querySelectorAll('.form-content input').forEach(function(rope8) {
            rope8.classList.toggle('dark');
        });

        document.querySelectorAll('#Mensaje').forEach(function(rope9) {
            rope9.classList.toggle('dark');
        });

        document.querySelectorAll('#SelectServ').forEach(function(rope10) {
            rope10.classList.toggle('dark');
        });

        document.querySelectorAll('.espacioContacto1 > p').forEach(function(rope11) {
            rope11.classList.toggle('dark');
        });
    });
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