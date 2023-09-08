<center><a href="logout.php"><button>logout</button></a>
<br>
<br>
<form method='post' action='search_book.php' enctype='multipart/form-data'>
    search 
    <input type="text" name="search">
    <input type="submit" name="search" value="search">
    </form>
</center>

<?php
include 'book.php';
require_once 'user.php';
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])){
  $username = $_COOKIE['username'];
$password = $_COOKIE['password'];
User::login($username ,$password);

}else{
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login_form.php');
}
}
$books = Social_book::show_books();

echo "<center><h1> Social books</h1></center>";
?>
<?php
if ($_SESSION['type'] == 'employees') { ?>
  <center><a href="add_social_book_form.php"><button>add Social book</button></a></center>
<?php  }
?>
<?php
foreach ($books as $book) {
  $user = book::get_user($book['user_id']);
  echo "<h3>title: " . $book['title'] . "</h3>";
  echo "<h4> Auther: " . $book['auther'] . "<h4>";
  echo "<h4> date: " . $book['date'] . "<h4>";
  echo "<h4> short_description: " . $book['short_description'] . "<h4>";
  echo "<h4> description: " . $book['description'] . "<h4>";
  echo "<p>booked by: " . $user['name'] . "</p><hr>";
?>
  <?php
  if ($_SESSION['type'] == 'employees') { ?>
    <a href="edit_social_book.php?id=<?php echo $book['id']; ?>"><button>Edit</button></a>
    <a href="delete_social_book.php?id=<?php echo $book['id']; ?>"><button>delete</button></a><hr>

  <?php  }
  ?>
<?php
}

$books1 = Scientific_book::show_books();
echo "<center><h1> Scientific books</h1></center>";
?>
<?php
if ($_SESSION['type'] == 'employees') { ?>
  <center><a href="add_scientific_book_form.php"><button>add Scientific book </button></a></center>
<?php  }
?>
<?php
foreach ($books1 as $book) {
  $user = book::get_user($book['user_id']);
  echo "<h3>title: " . $book['title'] . "</h3>";
  echo "<h4> Auther: " . $book['auther'] . "<h4>";
  echo "<h4> date: " . $book['date'] . "<h4>";
  echo "<h4> short_description: " . $book['short_description'] . "<h4>";
  echo "<img src='" . $book['imag'] . "' width='200'>";
  echo "<p>booked by: " . $user['name'] . "</p><hr>";
?>
  <?php
  if ($_SESSION['type'] == 'employees') { ?>
    <a href="edit_scientific_book.php?id=<?php echo $book['id']; ?>&file=<?php echo $book['imag']; ?>"><button>Edit</button></a>
    <a href="delete_scientific_book.php?id=<?php echo $book['id']; ?>&file=<?php echo $book['imag']; ?>"><button>delete</button></a><hr>


  <?php  }
  ?>
<?php
}
?>