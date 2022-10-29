document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableEmpresas");
  cleanModalClosed("addEmpresa");
  cleanModalClosed("editEmpresa");
  agregarEmpresa();
  agregarClaseEliminar();

  obtenerEmpresa();
  editarEmpresa();
});

function agregarEmpresa() {
  const formAddEmpresa = document.querySelector("#formAddEmpresa");

  formAddEmpresa.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddEmpresa);
    datos.append("save", "");

    try {
      let response = await fetch("controlador/empresa.controller.php", {
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

      location.replace("empresas");
    } catch (error) {
      console.log(e);
    }
  });
}

function agregarClaseEliminar() {
  $(".a-eliminar").click(function () {
    let idEmpresa = this.id;
    Swal.fire({
      title: "¿Seguro que quiere eliminar la Empresa?",
      showDenyButton: true,
      confirmButtonText: "Eliminar",
      denyButtonText: `No Eliminar`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        eliminarEmpresa(idEmpresa, "controlador/empresa.controller.php");
      } else if (result.isDenied) {
        Swal.fire("Empreas no Eliminada", "", "info");
      }
    });
  });
}

async function eliminarEmpresa(id, url) {
  try {
    let datos = new FormData();
    datos.append("delete", "1");
    datos.append("idEmpresa", id);
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
          location.replace("usuarios");
        }
      });
    }
  } catch (e) {
    console.log(e);
  }
}

async function obtenerEmpresa() {
  let idEmpresa = document.getElementById("idEmpresa");
  let logoEditado = document.getElementById("logoEditado");
  let nombreEditado = document.getElementById("nombreEditado");
  let id_documento_edit = document.getElementById("id_documento_edit");
  let documento_edit = document.getElementById("documento_edit");
  let razon_social_edit = document.getElementById("razon_social_edit");
  let nombre_edit = document.getElementById("nombre_edit");
  let apellido_paterno_edit = document.getElementById("apellido_paterno_edit");
  let apellido_materno_edit = document.getElementById("apellido_materno_edit");
  let direccion_edit = document.getElementById("direccion_edit");
  let telefono_edit = document.getElementById("telefono_edit");

  $(".a-editar").click(async function () {
    let idEmpresaEdit = this.dataset.id;

    try {
      let datosView = new FormData();
      datosView.append("consultar", "1");
      datosView.append("idEmpresa", idEmpresaEdit);
      let response = await fetch("controlador/empresa.controller.php", {
        method: "POST",
        body: datosView,
      });
      let data = await response.json();
      idEmpresa.value = data.id;
      logoEditado.value = data.logo;
      nombreEditado.value = data.logo_nombre;
      documento_edit.value = data.documento;
      id_documento_edit.value = data.id_documento;
      razon_social_edit.value = data.razon_social;
      nombre_edit.value = data.nombre;
      apellido_paterno_edit.value = data.apellido_paterno;
      apellido_materno_edit.value = data.apellido_materno;
      direccion_edit.value = data.direccion;
      telefono_edit.value = data.telefono;
    } catch (e) {
      console.log(e);
    }
  });
}

async function editarEmpresa() {
  const formEditEmpresa = document.querySelector("#formEditEmpresa");

  formEditEmpresa.addEventListener("submit", async (e) => {
    e.preventDefault();

    let datosEdit = new FormData(formEditEmpresa);
    datosEdit.append("edit", "1");

    try {
      let response = await fetch("controlador/empresa.controller.php", {
        method: "POST",
        body: datosEdit,
      });

      Swal.fire("Empresa Actualizada!", "", "success").then((result) => {
        if (result.isConfirmed) {
          location.replace("empresas");
        }
      });
    } catch (error) {
      console.log(e);
    }
  });
}
