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
    && empty($_POST['short_description']) && empty($_FILES['imag'])
) {
    die("title ,auther, date,short_description,image required <br>");
} else {
    $title = validatevalue($_POST['title']);
    $auther = validatevalue($_POST['auther']);
    $date = validatevalue($_POST['date']);
    $short_description = validatevalue($_POST['short_description']);
    $user_id = $_SESSION['user_id'];

    $imag_name = $_FILES['imag']['name'];
    $imag_tmp_name = $_FILES['imag']['tmp_name'];
    $imag_size = $_FILES['imag']['size'];
    $imag_type = $_FILES['imag']['type'];

    $imag_ext = strtolower(pathinfo($imag_name, PATHINFO_EXTENSION));
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imag_ext, $allowed_exts) && $imag_size < 1000000) {
        $imag_path = 'images/' . uniqid() . '.' . $imag_ext;
        move_uploaded_file($imag_tmp_name, $imag_path);
    } else {
        die("error in image <br>");
    }




    if (strlen($title) > 20) {
        die("title must be <20");
    }
    if (strlen($auther) > 20) {
        die("auther must be <20");
    }
    if (strlen($short_description) < 20) {
        die("short_description must be >200");
    }
    $book = new Scientific_book($title, $short_description, $auther, $date, $user_id, $imag_path);
    $book->add_book();
    header('location:book_form.php');
}
   
// }
