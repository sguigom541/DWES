<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        td,th {border:1px solid grey;padding:4px;}
        th{text-align:center;}
        table{border:1px solid black;}

    </style>
</head>
<body>
    <table>
    <tbody>

        <tr>
            <th>variable</th>
            <th>Valor</th>
        </tr>

        <?php
        /*
        foreach ($_SERVER as $variable => $valor) 
        {
            print "<tr>";
            print "<td>".$variable."</td>";
            print "<td>".$valor."</td>";
            print "</tr>";
        }
        */
        reset($_SERVER);
        while (key($_SERVER)!=null) 
        {
            
            print "<tr>";
            print "<td>".key($_SERVER)."=>".current($_SERVER)."</td>";
            
            print "</tr>";
            next($_SERVER);
        }        
        ?>
    </tbody>

    </table>
</body>
</html>