<?php
include "conn1.php";
abstract class Book
{
    protected  $title;
    protected  $short_description;
    protected  $auther;
    protected  $date;
    protected $user_id;
    public function __construct($title, $short_description, $auther, $date, $user_id)
    {
        $this->title = $title;
        $this->short_description = $short_description;
        $this->auther = $auther;
        $this->date = $date;
        $this->user_id = $user_id;
    }
    public function set_title($title)
    {
        $this->title = $title;
    }
    public function set_short_description($shot_description)
    {
        $this->short_description = $shot_description;
    }
    public function set_auther($auther)
    {
        $this->auther = $auther;
    }
    public function set_date($date)
    {
        $this->date = $date;
    }
    public function get_short_description()
    {
        return $this->short_description;
    }
    public function get_auther()
    {
        return $this->auther;
    }
    public function get_title()
    {
        return $this->title;
    }
    public function get_date()
    {
        return $this->date;
    }
    abstract static public function show_books();

    abstract public function add_book();

    abstract static public function update_book($book_id, $new_title, $new_auther, $new_date, $new_short_description, $new_description, $new_image);

    abstract static public function delete_book($book_id);

    abstract static public function get_book($book_id);

    // Get a user by their ID
    public static function get_user($user_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "SELECT * FROM users WHERE id = '$user_id' ";
        $stmt = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
}
class Social_book extends Book
{
    private $description;
    public function __construct($title, $short_description, $auther, $date, $user_id, $description)
    {
        parent::__construct($title, $short_description, $auther, $date, $user_id);
        $this->description = $description;
    }
    public static function show_books()
    {
        $db = Database::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM social_books";
        $stmt = mysqli_query($connection, $query);
        $books = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $books;
    }

    public function add_book()
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "INSERT INTO social_books(title, auther,	date,description,short_description, user_id) VALUES 
        ('$this->title','$this->auther','$this->date','$this->description','$this->short_description','$this->user_id')";
        $stmt = mysqli_query($conn, $query);
        if ($stmt) {
            echo "add";
        }
    }

    public static function update_book(
        $book_id,
        $new_title,
        $new_auther,
        $new_date,
        $new_short_description,
        $new_description,
        $new_image = null
    ) {
        $db = Database::getInstance();
        $connection = $db->getConnection();
        $query = "UPDATE social_books SET title = '$new_title', auther = '$new_auther' , date='$new_date', short_description = '$new_short_description' 
        , description ='$new_description'   WHERE id ='$book_id' ";
        $stmt = mysqli_query($connection, $query);
    }

    public static function delete_book($book_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "DELETE from social_books WHERE id ='$book_id' ";
        $stmt = mysqli_query($conn, $sql);
    }

    // Get a post by its ID
    public static function get_book($book_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "SELECT * FROM social_books WHERE id = '$book_id' ";
        $stmt = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
}
class Scientific_book extends Book
{
    private $image;
    public function __construct($title, $short_description, $auther, $date, $user_id, $image)
    {
        parent::__construct($title, $short_description, $auther, $date, $user_id);
        $this->image = $image;
    }
    public function set_image($image)
    {
        $this->image = $image;
    }
    public function get_image()
    {
        return $this->image;
    }
    public static function show_books()
    {
        $db = Database::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM scientific_books";
        $stmt = mysqli_query($connection, $query);
        $books = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $books;
    }

    public function add_book()
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "INSERT INTO scientific_books (title, auther,	date,short_description,imag, user_id) VALUES 
        ('$this->title','$this->auther','$this->date','$this->short_description','$this->image','$this->user_id')";
        $stmt = mysqli_query($conn, $query);
    }

    public static function update_book(
        $book_id,
        $new_title,
        $new_auther,
        $new_date,
        $new_short_description,
        $new_description = null,
        $new_image
    ) {
        $db = Database::getInstance();
        $connection = $db->getConnection();
        $query = "UPDATE scientific_books SET title = '$new_title', auther = '$new_auther' ,date='$new_date',short_description='$new_short_description' 
       , imag='$new_image '  WHERE id ='$book_id' ";
        $stmt = mysqli_query($connection, $query);
    }

    public static function delete_book($book_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "DELETE from scientific_books WHERE id ='$book_id' ";
        $stmt = mysqli_query($conn, $sql);
    }

    // Get a post by its ID
    public static function get_book($book_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $query = "SELECT * FROM scientific_books WHERE id = '$book_id' ";
        $stmt = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
}
