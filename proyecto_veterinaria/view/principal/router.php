<?php
    /**
     * Enrutador que enruta si el rol es el del usuario normal
     * 
     */
    if(isset($_GET['user']))
    {
        require_once './view/mantenimiento/usuario/menuUsuario.php';
        switch($_GET['user'])
        {
            case "cliente":
                require_once './view/mantenimiento/usuario/cliente.php';
            break;
            case "historialMascota":
                require_once './view/mantenimiento/usuario/historialMascota.php';
            break;
        }
    }



    /**
     * Enrutador que enruta si el rol es el del veterinario
     */
    if(isset($_GET['veterinario']))
    {
        require_once './view/mantenimiento/veterinario/administracion/menuAdmin.php';
        switch($_GET['veterinario'])
        {
            case "adminUsuarios":
                require_once './view/mantenimiento/veterinario/administracion/adminUsuario.php';
            break;
            case "crearUsuario":
                require_once './view/mantenimiento/veterinario/administracion/crearUsuario.php';
            break;
            case "editarUsuario":
                require_once './view/mantenimiento/veterinario/administracion/editarUsuario.php';
            break;
            case "eliminarUsuario":
                require_once './view/mantenimiento/veterinario/administracion/eliminarUsuario.php';
            break;
            case "adminMascotas":
                require_once './view/mantenimiento/veterinario/administracion/adminMascota.php';
            break;
            case "crearMascota":
                require_once './view/mantenimiento/veterinario/administracion/crearMascota.php';
            break;
            case "editarMascota":
                require_once './view/mantenimiento/veterinario/administracion/editarMascota.php';
            break;
            case "eliminarMascota":
                require_once './view/mantenimiento/veterinario/administracion/eliminarMascota.php';
            break;
            case "adminCVacunacion":
                require_once './view/mantenimiento/veterinario/administracion/adminCVacunacion.php';
            break;
            case "darCita":
                require_once './view/mantenimiento/veterinario/administracion/darCita.php';
            break;
            case "pasarVisita":
                require_once './view/mantenimiento/veterinario/administracion/pasarVisita.php';
            break;
            case "adminRol":
                require_once './view/mantenimiento/veterinario/otrasAdmin/adminRol.php';
            break;
            case "adminGenero":
                require_once './view/mantenimiento/veterinario/otrasAdmin/adminGenero.php';
            break;
            case "adminTipoVacuna":
                require_once './view/mantenimiento/veterinario/otrasAdmin/adminTipoVacuna.php';
            break;
            case "adminTipoMascota":
                require_once './view/mantenimiento/veterinario/otrasAdmin/adminTipoMascota.php';
            break;
            case "adminParteCuerpoChip":
                require_once './view/mantenimiento/veterinario/otrasAdmin/adminParteCuerpoChip.php';
            break;
            

        }
    }

    /**
     * Enrutador que enruta el rol del tipo de usuario que se encuentra logueado
     */
    if(isset($_GET['rol']))
    {
        switch($_GET['rol'])
        {
            case 1:
                header("location:?user=cliente");
            break;
            case 2:
                header("location:?veterinario=adminUsuarios");
            break;
        }
    }

    /**
     * Enrutador que enruta hacia el login y el logout
     */
    if(isset($_GET['acceso']))
    {
        switch($_GET['acceso'])
        {
            case "login":
                require_once './view/login/autentifica.php';
            break;
            case "logout":
                require_once './view/login/cerrarsesion.php';
            break;
        }
    }

?>