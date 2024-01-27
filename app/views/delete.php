<?php
require_once '../handlers/Book.php';
$book = new \App\Handler\Book;
$book = $book->deleteBook($_GET['id']);

if (!$book) {
    die("ID not found");
}

echo "
    <script>
        alert('Book deleted');
        window.location.href = '/dashboard';
    </script>
";
