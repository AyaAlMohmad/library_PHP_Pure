<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
<center> <br><br>
        <form method="post" action="register.php" enctype="multipart/form-data">
            <div>
                <label>Name:</label>
                <input type="text" name="name">
            </div><br>
                <label>Age</label>
                <input type="text" name="age">
            </div><br><br>
            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div><br>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div><br>
           
            <div>
                Type:
                Employees
                <input type="radio" name="type" value="employees" <?php if (isset($Type) && $Type === "employees") echo "checked" ?>>
                Visitors
                <input type="radio" name="type" value="visitors" <?php if (isset($Type) && $Type === "visitors") echo "checked" ?>>
            </div><br>
            <div>
                <label>Image</label>
                <input type="file" name="image">
            </div><br>
            <input type="submit" name="Register" value="Register">

        </form>
       
    </center>
</body>
</html>