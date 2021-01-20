<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table.minimalistBlack {
            border: 3px solid #000000;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table.minimalistBlack td,
        table.minimalistBlack th {
            border: 1px solid #000000;
            padding: 5px 4px;
        }

        table.minimalistBlack tbody td {
            font-size: 13px;
        }

        table.minimalistBlack thead {
            background: #CFCFCF;
            background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            border-bottom: 3px solid #000000;
        }

        table.minimalistBlack thead th {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            text-align: left;
        }
    </style>
    <script>
        window.addEventListener("load", function() {
            setInterval(function() {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) {
                        noticias = JSON.parse(this.responseText);
                        var tbody = document.getElementById("tbodyNoticia");
                        var respuesta = "";
                        for (let i = 0; i < noticias.length; i++) {
                            respuesta += '<tr><td>';
                            respuesta += noticias[i].title;
                            respuesta += "</td><td>";
                            respuesta += '<a href="'+noticias[i].link+'"'+'>'+noticias[i].link+'</a>';
                            //respuesta += noticias[i].link;
                            respuesta += "</td></tr>";

                        }
                        tbody.innerHTML = respuesta;
                    }
                }
                xhr.open("GET", "videojuegos_json.php", true);
                xhr.send();
            }, 5000)
        })
    </script>
</head>

<body>
    <table class="minimalistBlack">
        <thead>
            <th>Título</th>
            <th>Noticia</th>
        </thead>
        <tbody id="tbodyNoticia">

        </tbody>
    </table>
</body>

</html>