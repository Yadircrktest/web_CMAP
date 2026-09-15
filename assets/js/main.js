/* ============================================================
   Plantilla web · Contraloría Municipal de Ambrosio Plaza
   Menú móvil, desplegables, acordeón y validación de formulario
   ============================================================ */

(function () {
  'use strict';

  /* ---------- Menú móvil ---------- */
  var navToggle = document.getElementById('navToggle');
  var navMenu = document.getElementById('navMenu');

  function cerrarMenu() {
    if (!navMenu || !navToggle) return;
    navMenu.classList.remove('abierto');
    navToggle.classList.remove('activo');
    navToggle.setAttribute('aria-expanded', 'false');
  }

  if (navToggle && navMenu) {
    navToggle.addEventListener('click', function () {
      var abierto = navMenu.classList.toggle('abierto');
      navToggle.classList.toggle('activo', abierto);
      navToggle.setAttribute('aria-expanded', abierto ? 'true' : 'false');
    });
  }

  /* ---------- Desplegables en vista móvil ---------- */
  var desplegables = document.querySelectorAll('.nav-item-desplegable > a');
  Array.prototype.forEach.call(desplegables, function (enlace) {
    enlace.addEventListener('click', function (e) {
      if (window.innerWidth <= 991) {
        var item = enlace.parentElement;
        if (item.querySelector('.submenu')) {
          e.preventDefault();
          item.classList.toggle('abierto');
        }
      }
    });
  });

  /* Cerrar el menú móvil al seleccionar una opción que navegue */
  if (navMenu) {
    navMenu.addEventListener('click', function (e) {
      var destino = e.target.closest('a');
      if (!destino) return;
      var esSubmenu = destino.closest('.submenu') !== null;
      var enMenuMovil = window.innerWidth <= 991;
      if (esSubmenu && enMenuMovil) {
        cerrarMenu();
      }
      var esEnlaceDirecto = destino.closest('.nav-item:not(.nav-item-desplegable)');
      if (enMenuMovil && esEnlaceDirecto) {
        cerrarMenu();
      }
    });
  }

  /* ---------- Acordeón (preguntas frecuentes) ---------- */
  var acordeones = document.querySelectorAll('.acordeon');
  Array.prototype.forEach.call(acordeones, function (acordeon) {
    var botones = acordeon.querySelectorAll('.acordeon-titulo');
    Array.prototype.forEach.call(botones, function (boton) {
      boton.addEventListener('click', function () {
        var item = boton.closest('.acordeon-item');
        var contenido = item.querySelector('.acordeon-contenido');
        var abierto = item.classList.toggle('abierto');
        boton.setAttribute('aria-expanded', abierto ? 'true' : 'false');
        if (abierto) {
          contenido.style.maxHeight = contenido.scrollHeight + 'px';
        } else {
          contenido.style.maxHeight = null;
        }
      });
    });
  });

  /* ---------- Validación del formulario de contacto ---------- */
  var formulario = document.getElementById('formularioContacto');
  var aviso = document.getElementById('msjFormulario');

  function marcar(campo, mensaje) {
    var error = campo.closest('.campo').querySelector('.error');
    campo.classList.add('invalido');
    if (error) {
      error.textContent = mensaje;
      error.style.display = 'block';
    }
  }

  function limpiar(campo) {
    var error = campo.closest('.campo').querySelector('.error');
    campo.classList.remove('invalido');
    if (error) {
      error.textContent = '';
      error.style.display = 'none';
    }
  }

  if (formulario) {
    formulario.addEventListener('submit', function (e) {
      e.preventDefault();
      var valido = true;

      Array.prototype.forEach.call(formulario.querySelectorAll('[required]'), function (campo) {
        var valor = (campo.value || '').trim();
        if (!valor) {
          marcar(campo, 'Este campo es obligatorio.');
          valido = false;
        } else if (campo.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor)) {
          marcar(campo, 'Ingresa un correo electrónico válido.');
          valido = false;
        } else {
          limpiar(campo);
        }
      });

      if (!aviso) return;

      if (valido) {
        aviso.className = 'aviso-formulario exito';
        aviso.textContent = '¡Gracias por escribirnos! Tu solicitud fue enviada correctamente. Pronto te atenderemos.';
        formulario.reset();
        setTimeout(function () {
          aviso.className = 'aviso-formulario';
        }, 9000);
      } else {
        aviso.className = 'aviso-formulario error';
        aviso.textContent = 'Por favor, revisa los campos marcados en rojo e inténtalo de nuevo.';
      }
    });
  }

  /* ---------- Año automático en el pie ---------- */
  var anio = document.getElementById('anio');
  if (anio) {
    anio.textContent = new Date().getFullYear();
  }
})();