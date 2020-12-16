window.addEventListener("load",function(){
    var option=document.getElementById("especie");
    var divChip=document.getElementById("chip");
    option.addEventListener("change",function(){
        if(this.value=="ga01" || this.value=="pe01"){
            divChip.style.display="block";
        }
        else{
            divChip.style.display="none";
        }
    })
})