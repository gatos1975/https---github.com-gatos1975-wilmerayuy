//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init() {
  $("#usuarios_form").on("submit", (e) => {
    guardayeditarUsuarios(e);
  });
}

$().ready(() => {
  cargaTablaUsuarios();
});
var cargaTablaUsuarios = () => {
  var html = "";
  $.post(
    //"../../controllers/usuario.controller.php?op=todos",
    "../../controllers/productos.controller.php?op=todos",
    (listausuarios) => {
      listausuarios = JSON.parse(listausuarios);
      $.each(listausuarios, (index, productos) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${productos.nombre}</td>` +
          `<td>${productos.descripcion}</td>` +
          `<td>${productos.precio}</td>` +
          `<td>${productos.fecha_creacion}</td>` +
          `<td>${productos.detalle}</td>` +
          `<td>` +
          `<button class='btn btn-success'>Editar</button>` +
          `<button class='btn btn-danger'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#TablaUsuarios").html(html);
    }
  );
};

var cargaSelectRoles = () => {
  var html = ' <option value="0">Seleccione una Opcion</option>';
  $.post(
    "../../controllers/categoria.controller.php?op=todos",
    (listaroles) => {
      listaroles = JSON.parse(listaroles);
      $.each(listaroles, (index, rol) => {
        html += `<option value="${rol.categoria_id}">${rol.detalle}</option>`;
      });
      $("#idRoles").html(html);
    }
  );
};

var guardayeditarUsuarios = (e) => {
  e.preventDefault();
  var url = "";
  var form_Data = new FormData($("#usuarios_form")[0]);
  //var idUsaurio = document.getElementById("idUsaurio").value;
  var producto_id = document.getElementById("producto_id").value;
  if (producto_id === undefined || producto_id === "") {
    //url = "../../controllers/usuario.controller.php?op=insertar";
    url = "../../controllers/productos.controller.php?op=insertar";
  } else {
    url = "../../controllers/productos.controller.php?op=actualizar";
  }
  for (var pair of form_Data.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }
  $.ajax({
    url: url,
    type: "POST",
    data: form_Data,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        alert("Se guardo con exito");
        limpiar();
        cargaTablaUsuarios();
      } else {
        alert("Ocurrio un error al guardar. " + respuesta);
      }
    },
  });
};
var limpiar = () => {
  document.getElementById("Producto_id").value = "";
  document.getElementById("Nombre").value = "";
  $("#Descripcion").val("");
  $("#Precio").val("");
  $("#fecha_creacion").val("");
  $("#categoria_id").val("0");

  $("#modalUsuarios").modal("hide");
};

//function convertirFecha() {
//var fecha_creacion = document.getElementById("fecha_creacion").value;

//var partes = fecha_creacion.split("-");

// Obtener los componentes de la fecha
//var dia = partes[0];
// var mes = partes[1];
//var anio = partes[2];

// Construir la fecha en el nuevo formato
//var fechaConvertida = anio.substring(4) + "-" + mes + "-" + dia;
//var fechaConvertida = anio + "-" + mes + "-" + dia;
//console.log(fechaConvertida); // Mostrar en la consola la fecha convertida

// Realizar acciones adicionales con la fecha convertida

// Actualizar el valor del input con la fecha convertida
//document.getElementById("fecha_creacion").value = fechaConvertida;
//}
function convertirFecha() {
  var fecha_creacion = document.getElementById("fecha_creacion").value;
  var fechaObjeto = new Date(fecha_creacion);

  var dia = fechaObjeto.getDate();
  var mes = fechaObjeto.getMonth() + 1;
  var anio = fechaObjeto.getFullYear();

  // Asegurarse de que los componentes de la fecha tengan dos dígitos
  if (dia < 10) {
    dia = "0" + dia;
  }
  if (mes < 10) {
    mes = "0" + mes;
  }

  var fechaConvertida = anio + "-" + mes + "-" + dia;

  console.log(fechaConvertida); // Mostrar en la consola la fecha convertida

  // Realizar acciones adicionales con la fecha convertida

  // Actualizar el valor del input con la fecha convertida
  document.getElementById("fecha_creacion").value = fechaConvertida;
}

init();
