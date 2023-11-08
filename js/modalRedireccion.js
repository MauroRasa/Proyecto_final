document.addEventListener("DOMContentLoaded", function () {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('mostrarModal') && urlParams.get('mostrarModal') === 'true') {
      var modal = new bootstrap.Modal(document.getElementById('modalRecuperarFin'));
      modal.show();
    }
  });



  window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('modalToShow') && urlParams.get('modalToShow') === 'modalInicio') {
      var modal = new bootstrap.Modal(document.getElementById('modalInicio'));
      modal.show();
    }
  };