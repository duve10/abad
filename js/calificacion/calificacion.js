document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableCalificacion");
  cleanModalClosed("addCalificacion");
  cleanModalClosed("editCalificacion");
  agregarCalificacion();
  agregarClaseEliminar();
  // obtenerEmpresa();
  // editarEmpresa();
});

function agregarCalificacion() {
  const formAddCalificacion = document.querySelector("#formAddCalificacion");

  formAddCalificacion.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddCalificacion);
    datos.append("save", "");

    try {
      let response = await fetch("controlador/calificacion.controller.php", {
        method: "POST",
        body: datos,
      });

      let data = await response.json();

      if (data.error) {
        Swal.fire({
          icon: "error",
          text: data.mensaje,
        });

        return;
      }

      location.replace("calificacion");
    } catch (error) {
      console.log(e);
    }
  });
}

function agregarClaseEliminar() {
  $(".a-eliminar").click(function () {
    let idCalificacion = this.id;
    Swal.fire({
      title: "¿Seguro que quiere eliminar la Calificacion?",
      showDenyButton: true,
      confirmButtonText: "Eliminar",
      denyButtonText: `No Eliminar`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        eliminarCalificacion(idCalificacion, "controlador/calificacion.controller.php");
      } else if (result.isDenied) {
        Swal.fire("Empreas no Eliminada", "", "info");
      }
    });
  });
}

async function eliminarCalificacion(id, url) {
  try {
    let datos = new FormData();
    datos.append("delete", "1");
    datos.append("idCalificacion", id);
    let response = await fetch(url, {
      method: "POST",
      body: datos,
    });

    let data = await response.json();

    if (data.error) {
      return;
    } else {
      Swal.fire("Empresa Eliminada!", "", "success").then((result) => {
        if (result.isConfirmed) {
          location.replace("calificacion");
        }
      });
    }
  } catch (e) {
    console.log(e);
  }
}
