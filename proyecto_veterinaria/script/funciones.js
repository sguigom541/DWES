window.addEventListener("load", function () {
   

    //eventos para la ventana modal del usuario
    var modal = document.getElementById("divModal");
    var btnModal = document.getElementById("show-modalUsuario");
    
    var btnCerrar = document.getElementById("cerrarModal");
    
    var body = document.getElementsByTagName("body")[0];

    btnModal.addEventListener("click", function () {
        modal.style.display = "block";

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

