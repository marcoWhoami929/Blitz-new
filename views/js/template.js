$(function () {
    url = window.location.pathname;
  
    ruta = url.split("/");
  
    switch (ruta[2]) {
      case "encuestasFerreteras":
        listadoEncuestasFerreteras(1);
        break;
      
    }
  
  });
  function listadoEncuestasFerreteras(page) {
    var busqueda = $("#busqueda").val();
    var campoOrden = $("#campoOrden").val();
    var orden = $("#orden").val();
    var per_page = $("#per_page").val();
  
    var parametros = {
      action: "lista_encuestas",
      page: page,
      busqueda: busqueda,
      campoOrden: campoOrden,
      orden: orden,
      vista: "listadoEncuestasFerreteras",
      per_page: per_page,
    };
    $("#loader").fadeIn("slow");
    $.ajax({
      url: "ajax/notas.ajax.php",
      data: parametros,
      beforeSend: function (objeto) {
        $("#loader").html("Cargando Porfavor Espere ........");
      },
      success: function (data) {
        $(".lista-encuestas").html(data).fadeIn("slow");
        $("#loader").html("");
      },
    });
  }
  