<?php
class User
{
    private $name, $age, $email, $password, $type, $image;
    public function __construct($name, $age, $email, $password, $type, $image)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
        $this->image = $image;
    }
    public function register(){
        $db=Database::getInstance();
        $conn= $db->getConnection();
        $sql2 = "SELECT * FROM users where  email= '$this->email' ";
        $res = mysqli_query($conn, $sql2);
        $c = mysqli_num_rows($res);
        if ($c > 0) {
            die("your email is exist <br>");
        } else {
            $sql = "INSERT INTO users(name , age ,email, password, type,imag) VALUES ('$this->name ', '$this->age' ,
            '$this->email',' $this->password','$this->type' ,'$this->image')";
          $tt=mysqli_query($conn, $sql);
          if($tt) {
               return true;
        }}
    }
    public static function login($email,$password){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "SELECT * FROM users WHERE email = '$email' AND password ='$password'";    
        $stmt = mysqli_query($conn,$query);
        $user = mysqli_fetch_assoc($stmt);
    
        if ($user) {
          session_start();
          
          $_SESSION['user_id'] = $user['id'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['type'] = $user['type'];
          return true;
        }else{
        $sql = "SELECT name FROM users where  email<> '$email' AND password <>'$password' ";
        $res = mysqli_query($conn, $sql);
        $c = mysqli_num_rows($res);
        if ($c > 0) {
            die("your email or password Incorrect <br>");
         }
        }
    }
    public static function logout() {
        session_start();
        session_destroy();
      }
}
