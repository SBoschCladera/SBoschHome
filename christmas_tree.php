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
               echo "<font color=\"#87ceeb\">_</font>";
          //   echo"<span style='color: skyblue'>*</span>";
			}
			for ($k = $num - $i; $k < $num+1; $k++) {
               echo "*";

            }
            for ($k = $num - $i; $k < $num; $k++) {
                echo "*";
            }
            for ($j = $i; $j < $num; $j++) {
                echo "<font color=\"#87ceeb\">_</font>";
           //   echo"<span style='color: skyblue'>*</span>"
            }
            echo "<br>";
		}
    }
    ?>
</div>
    </body>
</html>