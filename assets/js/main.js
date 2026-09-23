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

  /* ---------- Botón volver arriba ---------- */
  var botonSubir = document.getElementById('botonSubir');
  if (botonSubir) {
    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 300) {
        botonSubir.classList.add('visible');
      } else {
        botonSubir.classList.remove('visible');
      }
    }, { passive: true });

    botonSubir.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------- Año automático en el pie ---------- */
  var anio = document.getElementById('anio');
  if (anio) {
    anio.textContent = new Date().getFullYear();
  }

  /* ---------- Buscador de manuales ---------- */
  var buscadorManual = document.getElementById('buscarManual');
  var cuerpoTablaManuales = document.getElementById('tablaManuales');

  if (buscadorManual && cuerpoTablaManuales) {
    var filaSinResultados = document.getElementById('sinResultados');

    function filtrarManuales() {
      var termino = buscadorManual.value.trim().toLowerCase();
      var visibles = 0;
      var filas = cuerpoTablaManuales.querySelectorAll('tr:not(#sinResultados)');

      Array.prototype.forEach.call(filas, function (fila) {
        var celdas = fila.cells;
        var denominacion = celdas && celdas[1] ? celdas[1].textContent.toLowerCase() : '';
        var coincide = termino === '' || denominacion.indexOf(termino) !== -1;
        fila.style.display = coincide ? '' : 'none';
        if (coincide) visibles++;
      });

      if (filaSinResultados) {
        filaSinResultados.style.display = visibles === 0 ? '' : 'none';
      }
    }

    buscadorManual.addEventListener('input', filtrarManuales);
  }

  /* ---------- Carrusel de contralores ---------- */
  var carrusel = document.getElementById('carruselContralores');
  if (carrusel) {
    var pista = carrusel.querySelector('.carrusel-pista');
    var items = pista.querySelectorAll('.carrusel-item');
    var btnAnterior = document.getElementById('carruselAnterior');
    var btnSiguiente = document.getElementById('carruselSiguiente');
    var contPuntos = document.getElementById('carruselPuntos');
    var indice = 0;
    var INTERVALO = 5000;
    var temporizador = null;

    function porVista() {
      var ancho = window.innerWidth;
      if (ancho <= 560) return 1;
      if (ancho <= 900) return 2;
      return 3;
    }

    function totalPaginas() {
      return Math.max(1, Math.ceil(items.length / porVista()));
    }

    function fijarIndice() {
      if (indice > totalPaginas() - 1) indice = totalPaginas() - 1;
      if (indice < 0) indice = 0;
    }

    function pintarPuntos() {
      if (!contPuntos) return;
      contPuntos.innerHTML = '';
      var paginas = totalPaginas();
      for (var i = 0; i < paginas; i++) {
        var punto = document.createElement('button');
        punto.type = 'button';
        punto.className = 'carrusel-punto' + (i === indice ? ' activo' : '');
        punto.setAttribute('aria-label', 'Ir a la página ' + (i + 1));
        punto.addEventListener('click', crearIrA(i));
        contPuntos.appendChild(punto);
      }
    }

    function crearIrA(posicion) {
      return function () {
        irA(posicion);
      };
    }

    function mover() {
      if (!items.length) return;
      var paso = items[0].offsetWidth;
      pista.style.transform = 'translate3d(-' + (indice * porVista() * paso) + 'px,0,0)';
      if (contPuntos) {
        Array.prototype.forEach.call(contPuntos.children, function (punto, i) {
          punto.classList.toggle('activo', i === indice);
        });
      }
    }

    function irA(posicion) {
      if (!items.length) return;
      indice = posicion;
      fijarIndice();
      mover();
      reiniciar();
    }

    function avanzar() {
      if (!items.length) return;
      indice = indice < totalPaginas() - 1 ? indice + 1 : 0;
      mover();
      reiniciar();
    }

    function reiniciar() {
      detener();
      temporizador = setInterval(avanzar, INTERVALO);
    }

    function detener() {
      if (temporizador) {
        clearInterval(temporizador);
        temporizador = null;
      }
    }

    if (btnAnterior) btnAnterior.addEventListener('click', function () {
      irA(indice > 0 ? indice - 1 : totalPaginas() - 1);
    });
    if (btnSiguiente) btnSiguiente.addEventListener('click', function () {
      irA(indice < totalPaginas() - 1 ? indice + 1 : 0);
    });
    carrusel.addEventListener('mouseenter', detener);
    carrusel.addEventListener('mouseleave', reiniciar);

    window.addEventListener('resize', function () {
      fijarIndice();
      mover();
      pintarPuntos();
    });

    pintarPuntos();
    mover();
    reiniciar();
  }
})();