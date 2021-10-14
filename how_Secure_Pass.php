<html lang="es">
<head>
    <title>How secure is your password</title>
</head>
<body>
<form method="post" action="how_Secure_Pass.php">
    <label>
        How Secure Is Your Password?
        <input type="text" name="pass"/>
    </label>
    <input type="submit"/>
</form>
<div>

    <?php

    $Passwords = array( "123456","123456789.","qwerty", "password","12345","qwerty123","1q2w3e","12345678", "111111", "1234567890");



    if (isset($_POST["pass"])) {
    $num = intval($_POST["pass"]);
    }
    ?>
</div>
    </body>
</html>