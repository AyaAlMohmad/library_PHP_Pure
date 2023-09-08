<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
<form action="add_social_book.php" method="post" enctype="multipart/form-data">
<label for="title">Title:</label>
<input type="text" id="title" name="title" required>
<br>
<br>
<label for="auther">auther:</label>
<input type="text" id="auther" name="auther" required>
<br>
<br>
<label for="date">date:</label>
<input type="text" id="date" name="date" required>
<br>
<br>
<label for="short_description">short_description:</label>
<input type="text" id="short_description" name="short_description" required>
<br>
<br>
<label for="description">description:</label>
<textarea id="description" name="description" required></textarea>
<br>
<br>

<input type="submit" value="Add book">
</form>
</center>
</body>
</html>