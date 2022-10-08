document.addEventListener("DOMContentLoaded", () => {
    tableGeneral("tableProceso");
    cleanModalClosed("addProceso");
    // cleanModalClosed("editProceso");
    // agregarPropiedad();
    // agregarClaseEliminar();
    // // obtenerCalificacion();
    // // editarCalificacion();
  });
  
  function agregarPropiedad() {
    const formAddPropiedad = document.querySelector("#formAddPropiedad");
  
    formAddPropiedad.addEventListener("submit", async (e) => {
      e.preventDefault();
      let datos = new FormData(formAddPropiedad);
      datos.append("save", "");
  
      try {
        let response = await fetch("controlador/propiedad.controller.php", {
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
  
        location.replace("propiedad");
      } catch (error) {
        console.log(e);
      }
    });
  }
  
  function agregarClaseEliminar() {
    $(".a-eliminar").click(function () {
      let idPropiedad = this.id;
      Swal.fire({
        title: "¿Seguro que quiere eliminar la Propiedad?",
        showDenyButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `No Eliminar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            eliminarPropiedad(idPropiedad, "controlador/propiedad.controller.php");
        } else if (result.isDenied) {
          Swal.fire("Propiedad no Eliminada", "", "info");
        }
      });
    });
  }
  
  async function eliminarPropiedad(id, url) {
    try {
      let datos = new FormData();
      datos.append("delete", "1");
      datos.append("idPropiedad", id);
      let response = await fetch(url, {
        method: "POST",
        body: datos,
      });
  
      let data = await response.json();
  
      if (data.error) {
        return;
      } else {
        Swal.fire("Propiedad Eliminada!", "", "success").then((result) => {
          if (result.isConfirmed) {
            location.replace("propiedad");
          }
        });
      }
    } catch (e) {
      console.log(e);
    }
  }
  
  
  async function obtenerCalificacion() {
    let idCalificacion = document.getElementById("idCalificacion");
    let descripcion = document.getElementById("descripcion_edit");
  
    $(".a-editar").click(async function () {
      let idCalificacionEdit = this.dataset.id;
  
      try {
        let datosView = new FormData();
        datosView.append("consultar", "1");
        datosView.append("idCalificacion", idCalificacionEdit);
        let response = await fetch("controlador/calificacion.controller.php", {
          method: "POST",
          body: datosView,
        });
        let data = await response.json();
        idCalificacion.value = data.id;
        descripcion.value = data.descripcion;
      } catch (e) {
        console.log(e);
      }
    });
  }
  
  
  async function editarCalificacion() {
    const formEditCalificacion = document.querySelector("#formEditCalificacion");
  
    formEditCalificacion.addEventListener("submit", async (e) => {
      e.preventDefault();
  
      let datosEdit = new FormData(formEditCalificacion);
      datosEdit.append("edit", "1");
  
      try {
        let response = await fetch("controlador/calificacion.controller.php", {
          method: "POST",
          body: datosEdit,
        });
  
        let data = await response.json();
  
        if (data.error) {
          Swal.fire({
            icon: "error",
            text: data.mensaje,
          });
  
          return;
        }
  
        Swal.fire("Calificacion Actualizada!", "", "success").then((result) => {
          if (result.isConfirmed) {
            location.replace("calificacion");
          }
        });
      } catch (error) {
        console.log(e);
      }
    });
  }
  