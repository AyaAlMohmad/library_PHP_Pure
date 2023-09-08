<?php
require_once 'user.php';
require_once 'book.php';
session_start();

$book_id = $_GET['id'];





// $user = $_SESSION['username'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $new_title = $_POST['title'];
  $new_auther = $_POST['auther'];
  $new_date = $_POST['date'];
  $new_short_description = $_POST['short_description'];


  $imag_name = $_FILES['imag']['name'];
  $imag_tmp_name = $_FILES['imag']['tmp_name'];
  $imag_size = $_FILES['imag']['size'];
  $imag_type = $_FILES['imag']['type'];

  $imag_ext = strtolower(pathinfo($imag_name, PATHINFO_EXTENSION));
  $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($imag_ext, $allowed_exts) && $imag_size < 1000000) {
    $imag_path = 'images/' . uniqid() . '.' . $imag_ext;
    move_uploaded_file($imag_tmp_name, $imag_path);
    $book = Scientific_book::get_book($book_id);
    if (!$book) {
      echo "Invalid book ID.";
      exit;
    }
    if ($_SESSION['user_id'] !== $book['user_id']) {
      echo "You don't have employee to edit this book.";
      exit;
    }
    Scientific_book::update_book($book_id, $new_title, $new_auther, $new_date, $new_short_description, $new_description = null, $imag_path);
    echo "Book updated successfully!";
    header('Location:book_form.php');
  } else {
    echo "Invalid imag format or size.";
    exit;
  }
}
echo "<center>";
echo "<form action='#' method='post' enctype='multipart/form-data'>";
echo "<label for='title'>Title:</label>";
echo "<input type='text' id='title' name='title' required>";
echo "<br>";
echo "<br>";
echo "<label for='auther'>auther:</label>";
echo "<input type='text' id='auther' name='auther' required>";
echo "<br>";
echo "  <br>";
echo " <label for='date'>date:</label>";
echo " <input type='text' id='date' name='date' required>";
echo " <br>";
echo " <br>";
echo "<label for='short_description'>short_description:</label>";
echo "<input type='text' id='short_description' name='short_description' required>";
echo "<br>";
echo "<br>";
echo "<label for='imag'>imag:</label>";
echo "<input type='file' id='imag' name='imag' required>";
echo " <br>";
echo "<br>";

echo "<input type='submit' value='update book'>";
echo "</form>";
echo "</center>";
