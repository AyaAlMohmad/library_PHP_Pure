<?php
// include "conn1.php";
require_once 'user.php';
require_once 'book.php';

session_start();

$book_id = $_GET['id'];





// $user = $_SESSION['username'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $new_title =$_POST['title'];
  $new_auther=$_POST['auther'];
  $new_date=$_POST['date'];
  $new_short_description=$_POST['short_description'];
  $new_description=$_POST['description'];
  
    $book = Social_book::get_book($book_id);
      if (!$book) {
        echo "Invalid book ID.";
        exit;
      }
      if ($_SESSION['user_id'] !== $book['user_id']) {
        echo "You don't have employee to edit this book.";
        exit;
      }
Social_book::update_book($book_id,$new_title,$new_auther,$new_date,$new_short_description,$new_description,$new_imag=null);
    
  echo "Book updated successfully!";
  header('Location:book_form.php');

} else {
//   $title = $post['title'];
//   $content = $post['content'];

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
  echo "<label for='description'>description:</label>";
  echo "<textarea id='description' name='description' required></textarea>";
  echo " <br>";
  echo "<br>";
  
  echo "<input type='submit' value='update book'>";
  echo "</form>";
  echo "</center>";
 
}
