window.addEventListener("load", function () {
   // función para ocultar el div de la vacuna de la mascota;
   var divVacuna = document.getElementById("vacuna");
   var checkbox = document.getElementById("quiereVacuna");
   checkbox.addEventListener("change", function () {
       if (checkbox.checked) {
           divVacuna.style.display = "block";
       }
       else {
           divVacuna.style.display = "none";
       }
   });

    //eventos para la ventana modal del usuario
    var modal = document.getElementById("divModal");
    var btnModal = document.getElementById("show-modalUsuario");
    var btnModalMascota = document.getElementById("show-modalMascota");
    var divModalMascota = document.getElementById("divModalMascota")
    var btnCerrar = document.getElementById("cerrarModal");
    var btnCerrarModalMascota = document.getElementById("cerrarModalMascota")
    var body = document.getElementsByTagName("body")[0];

    btnModal.addEventListener("click", function () {
        modal.style.display = "block";

        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    })
    btnModalMascota.addEventListener("click", function () {
        divModalMascota.style.display = "block";

        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    })
    btnCerrar.addEventListener("click", function () {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    })
    btnCerrarModalMascota.addEventListener("click", function () {
        divModalMascota.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    })

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
        }
    }



    // div para el chip del animal

    
})

