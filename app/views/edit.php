<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /login");
}

require_once '../handlers/Book.php';
$book = new \App\Handler\Book;
$b = $book->getBookById($_GET['id']);

if ($b == []) {
    die("ID not found");
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $borrowers = $_POST['borrowers'] ?? 0;
    $genre = $_POST['genre'] ?? 'N/A';

    $update = $book->editBook($name, $borrowers, $genre, $id);

    if ($update) {
        echo "
            <script>
                alert('Book updated');
                window.location.href = '/dashboard';
            </script>
        ";
    } else {
        die($update);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>

<body>
    <a href="/dashboard">back to dashboard</a>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $b['id'] ?>">
        <div>
            <label for="#name">Name</label>
            <input type="text" id="name" name="name" value="<?= $b['name'] ?>" required>
        </div>

        <div>
            <label for="#borrowers">Borrowers</label>
            <input type="number" min="0" id="borrowers" name="borrowers" value="<?= $b['borrowers'] ?>" required>
        </div>

        <div>
            <label for="#genre">Genre</label>
            <input type="text" id="genre" name="genre" value="<?= $b['genre'] ?>" required>
        </div>

        <button type="submit" name="submit">Update book</button>
    </form>
</body>

</html>