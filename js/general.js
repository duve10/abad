document.addEventListener("DOMContentLoaded", () => {});

/**FUNCIONES */

/**LIMPIAR MODAL */
function cleanModalClosed(idModal) {
  $("#" + idModal).on("hidden.bs.modal", function (e) {
    $(this)
      .find("input,textarea,select")
      .val("")
      .end()
      .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();
  });
}

//** DATA TABLE GENERAL */
function tableGeneral(idTable) {
  var table = $("#" + idTable).DataTable({
    lengthChange: false,
    buttons: ["copy", "excel", "pdf", "colvis"],
    ordering: false,
    language: {
      lengthMenu: "Mostrando _MENU_ datos por pagina",
      zeroRecords: "No se encontraron Datos",
      info: "Mostrando pagina _PAGE_ de _PAGES_",
      infoEmpty: "No se encontraron datos",
      infoFiltered: "(Filtrado desde _MAX_ total datos)",
      loadingRecords: "Cargando...",
      search: "Buscar:",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    },
  });

  table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
}

/**FETCH DATA */

async function fetchData(url) {
  return (await fetch(url)).json();
}

//*  getData */
async function getData(url) {
  try {
    let datos = [];
    datos = await fetchData(url);
    return datos;
  } catch (e) {
    console.log("Error");
    console.log(e);
  }
}

