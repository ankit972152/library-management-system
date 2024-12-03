<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>books</title>

  </head>
  <body id="top">
   <section class="header_menu" id="header_menu">
    <div class="container-fluid px-0 shadow">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <li class="nav-item">
             
            </li>
              <a class="nav-link" href="signin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">signup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"> logout</a>
            </li>
            
            <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search Books" aria-label="Search">
        <button class="btn btn-success mx-2" type="submit">Search</button>
      </form>
</ul>

</nav>
</div>
</div>
</section>

<body>
    <h1>Welcome to your cart </h1>
    <?php
// Start session if needed (optional)
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php

// Handle form submission for adding an item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $bookName = htmlspecialchars($_POST['book_name']);
    if (!empty($bookName)) {
        $sql = "INSERT INTO `books` (`book_name`) VALUES ('$book_name')";
        
    }
}

// Handle item deletion
if (isset($_GET['delete'])) {
    $itemId = intval($_GET['delete']);
    $stmt = $pdo->prepare('DELETE FROM books WHERE id = :id');
    $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
    $stmt->execute();
}

// Fetch all items
//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 20px; }
        table { border-collapse: collapse; width: 50%; text-align:center; }
        table, th, td { border: 1px solid black; text-align:center; margin-left:25%; }
        th, td { padding: 10px; text-align: center; }
        .btn { cursor: pointer; }
    </style>
</head>
<body>
    <h1>Manage your Books</h1>

    <!-- Add book Form -->
    <form method="post">
        <label for="book_name">Add Books:</label>
        <input type="text" name="book_name" id="book_name" required>
        <button type="submit" name="add" class="btn">Add</button>
    </form>

    <!-- book List -->
    <h2>Books List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Book  Name</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($books)) : ?>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= $book['id']; ?></td>
                    <td><?= htmlspecialchars($book['name']); ?></td>
                    <td>
                        <a href="?delete=<?= $books['id']; ?>" class="btn">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">No items found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

