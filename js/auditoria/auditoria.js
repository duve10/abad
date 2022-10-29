document.addEventListener("DOMContentLoaded", () => {
  tableGeneral("tableAuditoria");
  cleanModalClosed("addAuditoria");
  autocompleteEmpresa(document.getElementById("empresa"));
  autocompleteEmpresaByDoc(document.getElementById("documento"));
  // cleanModalClosed("editCalificacion");
  agregarAuditoria();
  // agregarClaseEliminar();
  // obtenerCalificacion();
  // editarCalificacion();
});

function agregarAuditoria() {
  const formAddAuditoria = document.querySelector("#formAddAuditoria");

  formAddAuditoria.addEventListener("submit", async (e) => {
    e.preventDefault();
    let datos = new FormData(formAddAuditoria);
    datos.append("save", "");

    try {
      let response = await fetch("controlador/auditoria.controller.php", {
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

function autocompleteEmpresa(inp) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a,
      b,
      i,
      val = this.value;

    if (val.length == 0) {
      closeAllLists();
      return;
    } else {
      fetch(
        "http://localhost/abad_asociados/controlador/auditoria.api?name=" + val
      )
        .then((response) => response.json())
        .then((data) => {
          let arr = data;

          closeAllLists();
          if (!val) {
            return false;
          }
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/

          for (i = 0; i < arr.length; i++) {
            let re3 = new RegExp(val);

            /*check if the item starts with the same letters as the text field value:*/
            if (true) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].documento + " " + "</strong> - ";
              b.innerHTML += arr[i].razon_social + " ";
              b.innerHTML += arr[i].nombre;
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML +=
                "<input type='hidden' data-idempresa='" +
                arr[i].id +
                "' data-documento='" +
                arr[i].documento +
                "' data-empresa='" +
                arr[i].razon_social +
                "' >";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function (e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                const documento = document.getElementById("documento");
                const empresa = document.getElementById("empresa");
                const id_empresa = document.getElementById("id_empresa");

                documento.value =
                  this.getElementsByTagName("input")[0].dataset.documento;
                empresa.value =
                  this.getElementsByTagName("input")[0].dataset.empresa;
                id_empresa.value =
                  this.getElementsByTagName("input")[0].dataset.idempresa;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });

      /*close any already open lists of autocompleted values*/
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) {
      //up
      /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = x.length - 1;
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}


function autocompleteEmpresaByDoc(inp) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a,
      b,
      i,
      val = this.value;

    if (val.length == 0) {
      closeAllLists();
      return;
    } else {
      fetch(
        "http://localhost/abad_asociados/controlador/auditoria.api?doc=" + val
      )
        .then((response) => response.json())
        .then((data) => {
          let arr = data;

          closeAllLists();
          if (!val) {
            return false;
          }
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/

          for (i = 0; i < arr.length; i++) {
            let re3 = new RegExp(val);

            /*check if the item starts with the same letters as the text field value:*/
            if (true) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].documento + " " + "</strong> - ";
              b.innerHTML += arr[i].razon_social + " ";
              b.innerHTML += arr[i].nombre;
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML +=
                "<input type='hidden' data-idempresa='" +
                arr[i].id +
                "' data-documento='" +
                arr[i].documento +
                "' data-empresa='" +
                arr[i].razon_social +
                "' >";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function (e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                const documento = document.getElementById("documento");
                const empresa = document.getElementById("empresa");
                const id_empresa = document.getElementById("id_empresa");

                documento.value =
                  this.getElementsByTagName("input")[0].dataset.documento;
                empresa.value =
                  this.getElementsByTagName("input")[0].dataset.empresa;
                id_empresa.value =
                  this.getElementsByTagName("input")[0].dataset.idempresa;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });

      /*close any already open lists of autocompleted values*/
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) {
      //up
      /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = x.length - 1;
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}
