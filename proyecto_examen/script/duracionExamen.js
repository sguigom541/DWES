window.addEventListener("load", function () {

    var horaHtml = document.getElementById("hora").innerHTML;
    var partes = horaHtml.innerHTML.split(":");
    var ahora = new Date();
    var futuro = new Date();

    futuro.setUTCHours(ahora.getUTCHours() + (partes[0] - 0));
    futuro.setUTCMinutes(ahora.getUTCMinutes() + (partes[1] - 0));
    futuro.setUTCSeconds(ahora.getUTCSeconds() + (partes[2] - 0));

    function actualiza() {

        var a = futuro - new Date();

        var dif = new Date(a);
        var actual = dif.getUTCHours() + ":" + dif.getUTCMinutes() + ":" + dif.getUTCSeconds();

        if (actual != "0:0:0") {
            horaHtml.innerHTML = actual;
            setTimeout(actualiza, 1000);
        }
        else {

            alert("El tiempo ha terminado");
            document.getElementById("enviar").click();//hacemos click en el botón de enviar examen si ya ha terminado el tiempo.
            

        }
    }
    setTimeout(actualiza, 1000);
})