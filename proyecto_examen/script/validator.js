window.addEventListener("load",function(){
    document.getElementById("mostrar_password").addEventListener("click",function(){
        var password=document.getElementById("password");
        if(this.checked)
        {
            password.type= "text";
        }
        else{
            password.type="password";
        }
    })
})