document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableAuditoriaDetalle");
  cleanModalClosed("addAuditoriaDetalle");

  obtenerCalificacionesSelect();
  obtenerPropiedadSelect();
  obtenerProcesoSelect();
  obtenerCicloSelect();
  obtenerTransaccionSelect();

  // cleanModalClosed("editCalificacion");
  agregarAuditoriaDetalle();
  // agregarClaseEliminar();
  // obtenerCalificacion();
  // editarCalificacion();
});

function agregarAuditoriaDetalle() {
  const formAddAuditoriaDetalle = document.querySelector("#formAddAuditoriaDetalle");

  formAddAuditoriaDetalle.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddAuditoriaDetalle);
    datos.append("save", "");

    try {
      let response = await fetch("controlador/auditoriaDetalle.controller.php", {
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

      location.replace("auditoria");
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
        eliminarCalificacion(
          idCalificacion,
          "controlador/calificacion.controller.php"
        );
      } else if (result.isDenied) {
        Swal.fire("Calificación no Eliminada", "", "info");
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
      Swal.fire("Calificaciòn Eliminada!", "", "success").then((result) => {
        if (result.isConfirmed) {
          location.replace("calificacion");
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

/**SELECT  */
async function obtenerCalificacionesSelect() {
  let calificacion = document.getElementById("calificacion");

  try {
    let response = await fetch("../controlador/calificacion.api.php", {
      method: "GET",
    });
    let data = await response.json();

    let option;

    for (let i = 0; i < data.length; i++) {
      option = document.createElement("option");
      option.text = data[i].descripcion;
      option.value = data[i].id;
      calificacion.add(option);
    }
  } catch (e) {
    console.log(e);
  }
}

async function obtenerPropiedadSelect() {
  let propiedad = document.getElementById("propiedad");

  try {
    let response = await fetch("../controlador/propiedad.api.php", {
      method: "GET",
    });
    let data = await response.json();

    let option;

    for (let i = 0; i < data.length; i++) {
      option = document.createElement("option");
      option.text = data[i].descripcion;
      option.value = data[i].id;
      propiedad.add(option);
    }
  } catch (e) {
    console.log(e);
  }
}

async function obtenerProcesoSelect() {
  let propiedad = document.getElementById("propiedad");
  let proceso = document.getElementById("proceso");
  let ciclo = document.getElementById("ciclo");
  let transaccion = document.getElementById("transaccion");

  propiedad.addEventListener("change", async () => {
    try {
      let response = await fetch(
        "../controlador/proceso.api.php?id_propiedad=" + propiedad.value,
        {
          method: "GET",
        }
      );
      let data = await response.json();

      proceso.innerHTML = "";
      ciclo.innerHTML = "";
      transaccion.innerHTML = "";

      let defaultOption = document.createElement("option");
      defaultOption.text = "Selecciona";

      let defaultOption2 = document.createElement("option");
      defaultOption2.text = "Selecciona";

      let defaultOption3 = document.createElement("option");
      defaultOption3.text = "Selecciona";

      proceso.add(defaultOption);
      proceso.selectedIndex = 0;

      ciclo.add(defaultOption2);
      ciclo.selectedIndex = 0;

      transaccion.add(defaultOption3);
      transaccion.selectedIndex = 0;

      let option;

      for (let i = 0; i < data.length; i++) {
        option = document.createElement("option");
        option.text = data[i].descripcion;
        option.value = data[i].id;
        proceso.add(option);
      }
    } catch (e) {
      console.log(e);
    }
  });
}

async function obtenerCicloSelect() {
  let proceso = document.getElementById("proceso");
  let ciclo = document.getElementById("ciclo");
  let transaccion = document.getElementById("transaccion");

  proceso.addEventListener("change", async () => {
    try {
      let response = await fetch(
        "../controlador/ciclo.api.php?id_proceso=" + proceso.value,
        {
          method: "GET",
        }
      );
      let data = await response.json();

      ciclo.innerHTML = "";
      transaccion.innerHTML = "";

      let defaultOption = document.createElement("option");
      defaultOption.text = "Selecciona";

      let defaultOption2 = document.createElement("option");
      defaultOption2.text = "Selecciona";

      ciclo.add(defaultOption);
      ciclo.selectedIndex = 0;

      transaccion.add(defaultOption2);
      transaccion.selectedIndex = 0;

      let option;

      for (let i = 0; i < data.length; i++) {
        option = document.createElement("option");
        option.text = data[i].descripcion;
        option.value = data[i].id;
        ciclo.add(option);
      }
    } catch (e) {
      console.log(e);
    }
  });
}

async function obtenerTransaccionSelect() {
  let ciclo = document.getElementById("ciclo");
  let transaccion = document.getElementById("transaccion");

  ciclo.addEventListener("change", async () => {
    try {
      let response = await fetch(
        "../controlador/transaccion.api.php?id_ciclo=" + ciclo.value,
        {
          method: "GET",
        }
      );
      let data = await response.json();

      transaccion.innerHTML = "";

      let defaultOption = document.createElement("option");
      defaultOption.text = "Selecciona";

      transaccion.add(defaultOption);
      transaccion.selectedIndex = 0;

      let option;

      for (let i = 0; i < data.length; i++) {
        option = document.createElement("option");
        option.text = data[i].descripcion;
        option.value = data[i].id;
        transaccion.add(option);
      }
    } catch (e) {
      console.log(e);
    }
  });
}
