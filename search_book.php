<?php
include "conn1.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $searcht=$_POST['search'];
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $sql1="SELECT * FROM scientific_books WHERE title='$search' OR auther='$search'";
    $sql2="SELECT * FROM social_books WHERE title='$search' OR auther='$search'";
    $stmt1 = mysqli_query($connection,$sql1);
    $stmt2 = mysqli_query($connection,$sql2);
    if(mysqli_num_rows($stmt1)>0){
    $book = mysqli_fetch_assoc($stmt1);
  echo "scientifc book : <br> title:" . $book['title'] . "author:" . $book['author'] ." date:" . $book['date'] . "<br>";
}
if(mysqli_num_rows($stmt2)>0){
    $book2 = mysqli_fetch_assoc($stmt2);
  echo "social book : <br> title:" . $book2['title'] . "author:" . $book2['author'] ."date:" . $book2['date'];
}
}
