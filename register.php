<?php
include "conn1.php";
include "user.php";
function validatevalue($value)
{
    $result1 = trim($value);
    $result2 = stripcslashes($result1);
    $result3 = strip_tags($result2);
    return $result3;
}
if (isset($_POST['Register'])) {
    if (
        !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email'])
        && !empty($_POST['password']) && !empty($_FILES['image']) && !empty($_POST['type'])
    ) {
        $name = validatevalue($_POST['name']);
        $age = validatevalue($_POST['age']);
        $email = validatevalue($_POST['email']);
        $password = validatevalue($_POST['password']);
        $type = validatevalue($_POST['type']);
       

        if (strlen($name) > 20) {
            die("name must be <20");
        }
        if ($age < 0) {
            die("age must be >0");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email address '$email' is error.<br>");
        }
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            die('Password should be at least 8 characters in length and should include at least 
        one upper case letter, one number, and one special character.<br>');
        }
        if (isset($_FILES['image'])) {
            $image_file=$_FILES["image"];
            $name_image=__DIR__ . "/images/" . $image_file["name"];

            $type_image = array("jpeg", "jpg", "png");
            if (file_exists(__DIR__ ."/images/" . $image_file["name"])&&!in_array($_FILES["image"]["type"],$type_image)&&$_FILES['image']['size']> 2097152) {
                die( "error in image <br>");
               
            }
             else {
                move_uploaded_file(   $image_file["tmp_name"], $name_image
            );
            }
        }
        $user = new User($name, $age, $email, $password, $type, $name_image);
        if ($user->register()) {
            header('Location: login_form.php');
            exit;
        } else {
            echo "Error Registrition";
            exit;
        }
    } else {
        die("name ,age ,email , password ,image ,Type and remember required <br>");
    }
}
