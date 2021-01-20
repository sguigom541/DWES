<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <div id="map"></div>
</head>

<body>
    <script>
        window.addEventListener("load", function() {

            setInterval(initMap, "60000");
        })
    </script>
    <script>
        function initMap() {
            var map;
            var results;
            map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 15,
                    center: new google.maps.LatLng(39.46990866979452, -6.388488264676796),
                    mapTypeId: 'roadmap'
                });

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    resultados = JSON.parse(this.responseText);
                    for (let i = 0; i < resultados.results.bindings.length; i++) {
                        var title = resultados.results.bindings[i].autobus.value;
                        var latLng = new google.maps.LatLng(
                            resultados.results.bindings[i].geo_lat.value,
                            resultados.results.bindings[i].geo_long.value
                        )
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: title,
                            map: map
                        });
                    }
                }
            }
            xhttp.open("GET", "autobuses_json.php");
            xhttp.send();
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1SIduNONY-pRoyx6kMJilVH5Cz3Zrq4c&callback=initMap"></script>

</body>

</html>