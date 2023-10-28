document.addEventListener("DOMContentLoaded", function() {
    const botonToggler = document.querySelector('.navbar-toggler');
    const logoBlanco = document.querySelector('.logo-blanco');
    const logoBlancoChico = document.querySelector('.logo-blanco_chico');

    if(window.getComputedStyle(botonToggler).display === 'none'){
      logoBlanco.classList.remove("d-none");
    }else{
      logoBlancoChico.classList.remove("d-none");
    }
  });


window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    var logoColor = document.querySelector(".logo-color");
    var logoBlanco = document.querySelector(".logo-blanco");

    const botonToggler = document.querySelector('.navbar-toggler');
    const logoColorChico = document.querySelector('.logo-color_chico');
    const logoBlancoChico = document.querySelector('.logo-blanco_chico');

    var backgroundHeader = document.querySelector(".navbar");
    var btnDrop = document.querySelector(".dropdown-menu");
    var sombra = document.querySelector(".navbar");



    header.classList.toggle("abajo",window.scrollY>0);
    if(window.getComputedStyle(botonToggler).display === 'none'){
      logoColorChico.classList.remove('mx-auto');
      logoColorChico.classList.add('d-none');
      logoBlancoChico.classList.add('d-none');
      logoBlanco.classList.add("d-none");
      logoColor.classList.remove("d-none");
    }else{
      logoColorChico.classList.remove('d-none');
      logoColorChico.classList.add('mx-auto');
      logoBlancoChico.classList.remove('mx-auto');
      logoBlancoChico.classList.add('d-none');
      logoBlanco.classList.add("d-none");
      logoColor.classList.add("d-none");
    }

    backgroundHeader.classList.add("bg-secondary");

    btnDrop.classList.remove("bg-transparent");
    btnDrop.classList.add("bg-secondary");

    sombra.classList.remove("shadow");

    if(window.scrollY===0){
      if(window.getComputedStyle(botonToggler).display === 'none'){
        logoColorChico.classList.remove('mx-auto');
        logoColorChico.classList.add('d-none');
        logoBlancoChico.classList.add('d-none');
        logoColor.classList.add("d-none");
        logoBlanco.classList.remove("d-none");
      }else{
        logoBlancoChico.classList.remove('d-none');
        logoBlancoChico.classList.add('mx-auto');
        logoColorChico.classList.remove('mx-auto');
        logoColorChico.classList.add('d-none');
        logoBlanco.classList.add("d-none");
        logoColor.classList.add("d-none");
      }
      
      backgroundHeader.classList.remove("bg-secondary");

      btnDrop.classList.remove("bg-secondary");
      btnDrop.classList.add("bg-transparent");

      sombra.classList.add("shadow");
    }
    });