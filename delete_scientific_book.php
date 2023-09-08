<?php
require_once 'book.php';

session_start();

$id = $_GET['id'];

  $book = Scientific_book::get_book($id);

  if (!$book) {
    echo "Invalid book ID.";
    exit;
  }
  
  
  if ($_SESSION['user_id'] !== $book['user_id']) {
      echo "You don't have employee to delete this book.";
    exit;
  }
  
  Scientific_book::delete_book($id);  
  echo "Book deleted successfully!";

  

?>
