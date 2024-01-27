<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /login");
}

require_once '../handlers/Book.php';
$book = new \App\Handler\Book;

$books = $book->getBooks();
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <a href="/add">Add Book</a>
    <a href="/logout">Logout</a>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Borrowers</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['borrowers'] ?></td>
                <td><?= $book['genre'] ?></td>
                <td>
                    <a href="/app/views/edit.php?id=<?= $book['id'] ?>">Edit</a>
                    <a href="/app/views/delete.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>