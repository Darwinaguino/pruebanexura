"use strict";
$(document).ready(function(evt) {

  var timer;
  var seconds = 2; // how often should we refresh the DIV?
  var dato = "";
  var posicion = "";
  var pos = "";

  //------------------------------FUNCION DE PAGINACION------------------------------------------
  $.fn.pageMe = function(opts) {
    var $this = this,
      defaults = {
        perPage: 7,
        showPrevNext: false,
        hidePageNumbers: false
      },
      settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage;
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector != "undefined") {
      children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector != "undefined") {
      pager = $(settings.pagerSelector);
    }

    var numItems = children.size();
    var numPages = Math.ceil(numItems / perPage);

    pager.data("curr", 0);

    if (settings.showPrevNext) {
      $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }

    var curr = 0;
    while (numPages > curr && (settings.hidePageNumbers == false)) {
      $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
      curr++;
    }

    if (settings.showPrevNext) {
      $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }

    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages <= 1) {
      pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");

    children.hide();
    children.slice(0, perPage).show();

    pager.find('li .page_link').click(function() {
      var clickedPage = $(this).html().valueOf() - 1;
      goTo(clickedPage, perPage);
      return false;
    });
    pager.find('li .prev_link').click(function() {
      previous();
      return false;
    });
    pager.find('li .next_link').click(function() {
      next();
      return false;
    });

    function previous() {
      var goToPage = parseInt(pager.data("curr")) - 1;
      goTo(goToPage);
    }

    function next() {
      goToPage = parseInt(pager.data("curr")) + 1;
      goTo(goToPage);
    }

    function goTo(page) {
      var startAt = page * perPage,
        endOn = startAt + perPage;

      children.css('display', 'none').slice(startAt, endOn).show();

      if (page >= 1) {
        pager.find('.prev_link').show();
      } else {
        pager.find('.prev_link').hide();
      }

      if (page < (numPages - 1)) {
        pager.find('.next_link').show();
      } else {
        pager.find('.next_link').hide();
      }

      pager.data("curr", page);
      pager.children().removeClass("active");
      pager.children().eq(page + 1).addClass("active");

    }
  };



  $('#tableProductos').pageMe({
    pagerSelector: '#paginacionProductos',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });
  $('#tableProveedores').pageMe({
    pagerSelector: '#paginacionProveedores',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });
  $('#tableCategorias').pageMe({
    pagerSelector: '#paginacionCategorias',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });
  $('#tablePedidos').pageMe({
    pagerSelector: '#paginacionPedidos',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });

  $('#tableHistorialPedidos').pageMe({
    pagerSelector: '#paginacionHistorial',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });


  $('#tableFacturas').pageMe({
    pagerSelector: '#paginacionFacturas',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });

  $('#tableGeneracion').pageMe({
    pagerSelector: '#paginacionGeneracion',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });

  $('#tableBoleta').pageMe({
    pagerSelector: '#paginacionBoletas',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });

  $('#tableProductosAgotados').pageMe({
    pagerSelector: '#paginacionProductosAgotados',
    showPrevNext: true,
    hidePageNumbers: false,
    perPage: 5
  });



  //-----------------------------------FIN FUNCION DE PAGINACION---------------------------------



});


function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) {
      return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
  }
  return null;
}


function accionarPedido(valor) {
  var myId = valor;

  $('#update-pedido form#' + myId).submit(function(e) {
    e.preventDefault();
    var informacion = $('#update-pedido form#' + myId).serialize();
    var metodo = $('#update-pedido form#' + myId).attr('method');
    var peticion = $('#update-pedido form#' + myId).attr('action');
    $.ajax({
      type: metodo,
      url: peticion,
      data: informacion,
      beforeSend: function() {
        $("div#" + myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
      },
      error: function() {
        $("div#" + myId).html("Ha ocurrido un error en el sistema");
      },
      success: function(data) {
        $("div#" + myId).html(data);
      }
    });
    return false;
  });


}



function llenarListaSeleccionada() {
  $.getJSON('FilaSeleccionada.json', function(response) {
    let list = response.posicion;
    if (list.length < 1) {
    } else {
      $('#tablaSeleccionada tr').remove();
      for (let i = 0; i < list.length; i++) {
        $('#tablaSeleccionada').append('<tr data-NumPedido="' + list[i].NumPedido + '">' +
          '<td>' + list[i].NumPedido + '</td>' +
          '<td>' + list[i].CodigoProd + '</td>' +
          '<td>' + list[i].CantidadProductos + '</td>' +
          '<td>' + list[i].Precio + '</td>' +
          '<td>' + list[i].Marca + '</td>' +
          '<td class="thumbnail"><img src="assets/img-products/' + list[i].Imagen + '"  alt="" class="img-rounded"></td>' +
          '</tr>'
        );

      }
    }
  });
}

function llenarFilaSeleccionada() {

  $.getJSON('FilaSeleccionada.json', function(response) {
    let list = response.posicion;
    if (list.length < 1) {
      //alert("SIN NINGÚN RESULTADO");
    } else {
      $('#tablaSeleccionada tr').remove();
      for (let i = 0; i < list.length; i++) {
        $('#tablaSeleccionada').append('<tr data-NumPedido="' + list[i].NumPedido + '">' +
          '<td>' + list[i].NumPedido + '</td>' +

          '</tr>'
        );
      }
    }
  }); // fin de $.getJSON

}

function refresh() {
  timer = setInterval(function() {
    $('#dataTable').load(document.URL + '#dataTable');
  }, seconds * 1000);

}



function cancelActivityRefresh() {
  clearInterval(timer);
}



function enviarDato(id, dato) {
  $("#" + id).val(dato);
  $("#" + id).parent('form').submit();
}


//$('#tableGeneracion').on('click', 'tr td', function(evt) {
  //var target, NumPedido, valorSeleccionado;
  //target = $(event.target);
  //valorSeleccionado = target.text();

  //alert("Valor Seleccionado: " + valorSeleccionado);
//});
