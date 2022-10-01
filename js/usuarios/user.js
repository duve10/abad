document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableUsers");
  cleanModalClosed("addUser");
  cleanModalClosed("editUser");
  agregarUsuario();
  agregarClaseEliminar();
  ObtenerUsuario();
});

function agregarUsuario() {
  const formAddUser = document.querySelector("#formAddUser");

  formAddUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddUser);
    datos.append("save", "");

    try {
      let response = await fetch("controlador/user.controller.php", {
        method: "POST",
        body: datos,
      });

      let data = await response.text();

      location.replace("usuarios");
    } catch (error) {
      console.log(e);
    }
  });
}

function agregarClaseEliminar() {
  $(".a-eliminar").click(function () {
    let idUser = this.id;
    Swal.fire({
      title: "¿Seguro que quiere eliminar al Usuario?",
      showDenyButton: true,
      confirmButtonText: "Eliminar",
      denyButtonText: `No Eliminar`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        eliminarUsuario(idUser, "controlador/user.controller.php");
      } else if (result.isDenied) {
        Swal.fire("Usuario no Elimado", "", "info");
      }
    });
  });
}

async function eliminarUsuario(id, url) {
  try {
    let datos = new FormData();
    datos.append("delete", "1");
    datos.append("idUsuario", id);
    let response = await fetch(url, {
      method: "POST",
      body: datos,
    });
    Swal.fire("Usuario Eliminado!", "", "success").then((result) => {
      if (result.isConfirmed) {
        location.replace("usuarios");
      }
    });
  } catch (e) {
    console.log(e);
  }
}

async function ObtenerUsuario() {
  let nombre_usuario_edit = document.getElementById("nombre_usuario_edit");
  let password_edit = document.getElementById("password_edit");
  let nombres_edit = document.getElementById("nombres_edit");
  let apellido_paterno_edit = document.getElementById("apellido_paterno_edit");
  let apellido_materno_edit = document.getElementById("apellido_materno_edit");
  let id_documento_edit = document.getElementById("id_documento_edit");
  let documento_edit = document.getElementById("documento_edit");
  let idrol_edit = document.getElementById("idrol_edit");

  $(".a-editar").click(async function () {
    let idUserEdit = this.dataset.id;

    try {
      let datosView = new FormData();
      datosView.append("consultar", "1");
      datosView.append("idUsuario", idUserEdit);
      let response = await fetch("controlador/user.controller.php", {
        method: "POST",
        body: datosView,
      });
      let data = await response.json();
      nombre_usuario_edit.value = data.nombre_usuario;
      password_edit.value = data.password;
      nombres_edit.value = data.nombres;
      apellido_paterno_edit.value = data.apellido_paterno;
      apellido_materno_edit.value = data.apellido_materno;
      id_documento_edit.value = data.id_documento;
      documento_edit.value = data.documento;
      idrol_edit.value = data.idrol;

      editarUsuario(idUserEdit, "controlador/user.controller.php");
    } catch (e) {
      console.log(e);
    }
  });
}

async function editarUsuario(id, url) {
  const formEditUser = document.querySelector("#formEditUser");

  formEditUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datosEdit = new FormData(formEditUser);
    datosEdit.append("edit", "1");
    datosEdit.append("idUsuario", id);

    try {
      let response = await fetch(url, {
        method: "POST",
        body: datosEdit,
      });
      Swal.fire("Usuario Actualizado!", "", "success").then((result) => {
        if (result.isConfirmed) {
          location.replace("usuarios");
        }
      });
    } catch (error) {
      console.log(e);
    }
  });
}
