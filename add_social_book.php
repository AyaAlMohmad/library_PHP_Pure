<?php
require_once 'book.php';
function validatevalue($value)
{
    $result1 = trim($value);
    $result2 = stripcslashes($result1);
    $result3 = strip_tags($result2);
    return $result3;
}
session_start();
// if (isset($_POST['add_book'])) {
    if (
        empty($_POST['title']) && empty($_POST['auther']) && empty($_POST['date'])
        && empty($_POST['short_description']) && empty($_POST['description'])
    ) {
        die("title ,auther, date,short_description,description required <br>");
    } else {
        $title = validatevalue($_POST['title']);
        $auther = validatevalue($_POST['auther']);
        $date = validatevalue($_POST['date']);
        $short_description = validatevalue($_POST['short_description']);
        $description = validatevalue($_POST['description']);
        $user_id = $_SESSION['user_id'];




        if (strlen($title) > 20) {
            die("title must be <20");
        }
        if (strlen($auther) >20) {
            die("auther must be <20");
        }
        if (strlen($short_description) <20) {
            die("short_description must be >200");
        }
        if (strlen($description) < 20) {
            die("description must be >2000");
        }
        $book = new Social_book($title, $short_description, $auther, $date, $user_id, $description);
        $book->add_book();
        header('location:book_form.php');
    }
   
// }
