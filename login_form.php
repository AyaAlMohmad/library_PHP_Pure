<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center> <br><br>
        <form method="post" action="login.php" enctype="multipart/form-data">
            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div><br>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div><br>
            <div>
                Remember Me:
                <input type="checkbox" name="remember">
            </div><br>
            <input type="submit" name="login" value="Login">
        </form>
    </center>
</body>

</html>