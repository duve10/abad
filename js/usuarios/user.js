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


