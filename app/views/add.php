<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /login");
}

require_once '../handlers/Book.php';
$book = new \App\Handler\Book;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $borrowers = $_POST['borrowers'] ?? 0;
    $genre = $_POST['genre'] ?? 'N/A';

    $insert = $book->addBook($name, $borrowers, $genre);

    if ($insert) {
        echo "
            <script>
                alert('Book added');
                window.location.href = '$_SERVER[PHP_SELF]';
            </script>
        ";
    } else {
        die($insert);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>

<body>
    <a href="/dashboard">back to dashboard</a>
    <form action="" method="POST">
        <div>
            <label for="#name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="#borrowers">Borrowers</label>
            <input type="number" min="0" id="borrowers" name="borrowers" value="0" required>
        </div>

        <div>
            <label for="#genre">Genre</label>
            <input type="text" id="genre" name="genre" required>
        </div>

        <button type="submit" name="submit">Add new book</button>
    </form>
</body>

</html>