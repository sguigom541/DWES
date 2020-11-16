<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comenzar Examen</title>
    <script src="../script/preExamen.js"></script>
    <link rel="stylesheet" href="../estilos/estilosLogin.css">
    
</head>
<body>
    <?php
        session_start();
    ?>
    
    
    <fieldset style="border: 1px solid rgb(255,232,57);width: 400px;margin:auto">
        <legend>¿comenzar Examen?</legend>
        <form action="../control/examen_controller.php" method="post">
        <label for="respuesta" style="color: white;">¿Desea realizar el examen?</label>
        <input type="button" id="si" value="SI"/>
        <input type="button"  id="no" value="NO"/>
        </form>
    </fieldset>
    
    
    <script>

        document.getElementById("si").addEventListener("click",function(){
            this.form.submit();

        })
        document.getElementById("no").addEventListener("click",function(){
           window.location.replace("login.php");
        })
    </script>
    
</body>
</html>