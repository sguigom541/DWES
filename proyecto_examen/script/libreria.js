window.addEventListener("load", function () {

    
    var preguntas = centro.getElementsByClassName("pregunta");
    
    for (let i = 1; i < preguntas.length; i++) {
        
        toggle("oculto",preguntas[i]);

    }

    var botAnt=document.getElementById("boton-anterior");
    var botSig =document.getElementById("boton-siguiente");

    botSig.addEventListener("click", function(){

        //La pregunta que no esta oculta, en la que me encuentro ahora
        var ahora = this.parentNode.parentNode.querySelector(".pregunta:not(.oculto)");
        //El siguiene hermano de quien no esta oculto
        var next = ahora.nextElementSibling;

        var final = next.nextElementSibling.getAttribute("class", this.contains);

       // var preActual = parseInt(document.getElementById("preguntaAtual").value);
       // document.getElementById("preguntaAtual").value = preActual+1;


        if(next)
        {
            toggle("oculto", ahora);
            toggle("oculto", next);
           botAnt.style.visibility = "visible";

            if(final == null)
            {
                botSig.style.visibility = "hidden";
            }
        }
    })
    
    botAnt.addEventListener("click",function(){
        //La pregunta que no esta oculta, en la que me encuentro ahora
        var ahora = this.parentNode.parentNode.querySelector(".pregunta:not(.oculto)");
        //El siguiene hermano de quien no esta oculto
        var ant = ahora.previousElementSibling;

        var final = ant.previousElementSibling;
        if(ant)
        {
            toggle("oculto", ahora);
            toggle("oculto", ant);
           botSig.style.visibility = "visible";

            if(final == null)
            {
                botAnt.style.visibility = "hidden";
            }
        }

    })
    //accedemos al boton enviar y al formulario y creamos el manejador de evento del boton enviar
    var botonEnviar = document.getElementById("enviar");
    var formulario = document.getElementById("formulario");
    botonEnviar.addEventListener("click", function (ev) {

        ev.preventDefault();
        if (confirm("¿desea enviar el examen?"))
            formulario.submit();
    })




    function toggle(clase, objeto) {
        var clasesActuales = objeto.getAttribute("class");
        if (!clasesActuales) {
            nuevaClase = clase;
        }
        else {
            var expReg = new RegExp("(^" + clase + "$|^" + clase + " | " + clase + " | " + clase + "$)");
            var nuevaClase = clasesActuales.replace(expReg, "");
            if (clasesActuales == nuevaClase) {
                nuevaClase += " " + clase;
               
            }
        }
        objeto.setAttribute("class", nuevaClase);
    }


    /*//barra de progreso

    var barraProgreso=document.getElementById("mybar");
    var porcentaje="";
    var tamanio=preguntas.length;
    porcentaje=(preguntas[0].getAttribute("id") *100) / (tamanio);
    porcentaje=porcentaje + "%";
    barraProgreso.style.width=porcentaje;*/









    var horaHtml = document.getElementById("hora");
    var partes = horaHtml.innerHTML.split(":");
    var ahora = new Date();
    var futuro = new Date();

    futuro.setUTCHours(ahora.getUTCHours() + (partes[0] - 0));
    futuro.setUTCMinutes(ahora.getUTCMinutes() + (partes[1] - 0));
    futuro.setUTCSeconds(ahora.getUTCSeconds() + (partes[2] - 0));
    console.log(futuro);
    console.log(ahora);
    console.log(partes);
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