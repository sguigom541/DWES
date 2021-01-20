<?php
    $fichero=new DOMDocument();
    $fichero->load("https://uvejuegos.com/contenidosRSS.jsp");
    $arraySalida=array();
    $noticiasVideojuegos=$fichero->getElementsByTagName("item");
    foreach ($noticiasVideojuegos as $entrada) {
        $nuevo=array();
        $nuevo['title']=$entrada->getElementsByTagName("title")[0]->nodeValue;
        $nuevo['link']=$entrada->getElementsByTagName("link")[0]->nodeValue;
        $arraySalida[]=$nuevo;
    }

    echo json_encode($arraySalida);


