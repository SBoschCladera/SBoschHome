<html lang="es">
<head>
    <title>Christmas tree</title>
</head>
<body>
<form method="post" action="christmas_tree.php">
    <label>
        Number of flats:
        <input type="text" name="numFlats"/>
    </label>
    <input type="submit"/>
</form>
<div style="background-color: skyblue; display: inline-block;">

    <?php

    if (isset($_POST["numFlats"])) {
    $num = intval($_POST["numFlats"]);


        for ($i = 0; $i < $num; $i++) {

            for ($j = $i; $j < $num; $j++) {
                echo "_";
			}

			for ($k = $num - $i; $k < $num+1; $k++) {

                echo "*";




            }echo "<br>";


		}
    }
    ?>








</div>
    </body>
</html>


