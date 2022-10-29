document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableProceso");
  cleanModalClosed("addProceso");
  cleanModalClosed("editProceso");
  agregarProceso();
  agregarClaseEliminar();
  obtenerProceso();
  editarProceso();
});

function agregarProceso() {
  const formAddProceso = document.querySelector("#formAddProceso");

  formAddProceso.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddProceso);
    datos.append("save", "");

    try {
      let response = await fetch("../../controlador/proceso.controller.php", {
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
      } else {
        let idPropiedad = data.dato.idPropiedad;
        let descripcionProp = data.dato.descripcion;

        location.reload();
      }
    } catch (error) {
      console.log(e);
    }
  });
}

function agregarClaseEliminar() {
  $(".a-eliminar").click(function () {
    let idProceso = this.id;
    Swal.fire({
      title: "¿Seguro que quiere eliminar el Proceso?",
      showDenyButton: true,
      confirmButtonText: "Eliminar",
      denyButtonText: `No Eliminar`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        eliminarProceso(idProceso, "../../controlador/proceso.controller.php");
      } else if (result.isDenied) {
        Swal.fire("Proceso no Eliminado", "", "info");
      }
    });
  });
}

async function eliminarProceso(id, url) {
  try {
    let datos = new FormData();
    datos.append("delete", "1");
    datos.append("idProceso", id);
    let response = await fetch(url, {
      method: "POST",
      body: datos,
    });

    let data = await response.json();

    if (data.error) {
      return;
    } else {
      Swal.fire("Proceso Eliminado!", "", "success").then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
    }
  } catch (e) {
    console.log(e);
  }
}

async function obtenerProceso() {
  let idProceso = document.getElementById("idProceso");
  let descripcion = document.getElementById("descripcion_edit");

  $(".a-editar").click(async function () {
    let idProcesoEdit = this.dataset.id;

    try {
      let datosView = new FormData();
      datosView.append("consultar", "1");
      datosView.append("idProceso", idProcesoEdit);
      let response = await fetch("../../controlador/proceso.controller.php", {
        method: "POST",
        body: datosView,
      });
      let data = await response.json();
      idProceso.value = data.id;
      descripcion.value = data.descripcion;
    } catch (e) {
      console.log(e);
    }
  });
}

async function editarProceso() {
  const formEditProceso = document.querySelector("#formEditProceso");

  formEditProceso.addEventListener("submit", async (e) => {
    e.preventDefault();

    let datosEdit = new FormData(formEditProceso);
    datosEdit.append("edit", "1");

    try {
      let response = await fetch(
        "../../controlador/proceso.controller.php",
        {
          method: "POST",
          body: datosEdit,
        }
      );

      let data = await response.json();

      if (data.error) {
        Swal.fire({
          icon: "error",
          text: data.mensaje,
        });

        return;
      }  else {
        Swal.fire(data.mensaje, "", "success").then((result) => {
          if (result.isConfirmed) {
            location.reload();
          }
        });
      }

     
    } catch (error) {
      console.log(e);
    }
  });
}
