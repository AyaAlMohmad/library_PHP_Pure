<?php
include "conn1.php";
include "user.php";


if (isset($_POST['login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(isset($_POST['remember'])){
            setcookie("email" ,$_POST['email'], time()+30*24*60*60);
            setcookie("password" ,$_POST['password'], time()+30*24*60*60);
        }
        $user=User::login($email,$password);
        IF($user){
            header('Location:book_form.php');
        }
    //    else {
    //         
    //     }
    } else {
        die("email and password required");
    }
}