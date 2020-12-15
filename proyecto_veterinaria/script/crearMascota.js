window.addEventListener("load",function(){
    var option=document.getElementById("especie");
    var divChip=document.getElementById("chip");
    option.addEventListener("change",function(){
        if(this.value=="0" || this.value=="1"){
            divChip.style.display="block";
        }
        else{
            divChip.style.display="none";
        }
    })
})