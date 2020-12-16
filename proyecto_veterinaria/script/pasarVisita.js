window.addEventListener("load",function(){
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

   var btnModalMascota = document.getElementById("show-modalMascota");
    var divModalMascota = document.getElementById("divModalMascota");
    var btnCerrarModalMascota = document.getElementById("cerrarModalMascota");

    btnModalMascota.addEventListener("click", function () {
        divModalMascota.style.display = "block";

        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    })

    btnCerrarModalMascota.addEventListener("click", function () {
        divModalMascota.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    })

})