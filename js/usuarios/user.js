document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableUsers");
  cleanModalClosed("addUser");
  agregarUsuario();
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

$(".a-eliminar").click(function () {
  let idUser = this.id;
  Swal.fire({
    title: '¿Seguro que quiere eliminar al Usuario?',
    showDenyButton: true,
    confirmButtonText: 'Eliminar',
    denyButtonText: `No Eliminar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      eliminarUsuario(idUser,"controlador/user.controller.php");

    } else if (result.isDenied) {
      Swal.fire('Usuario no Elimado', '', 'info')
    }
  })

  
  
});


async function eliminarUsuario(id, url) {
  try {

    let datos = new FormData();
    datos.append("delete", "1");
    datos.append("idUsuario", id);
    let response = await fetch(url, {
      method: "POST",
      body: datos,
    });
 
    location.replace("usuarios");
  } catch (e) {
    console.log(e);
  }
}