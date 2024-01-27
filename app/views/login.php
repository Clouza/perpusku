<?php
session_start();

require_once '../database/connection.php';
$conn = new \App\Database\Connection;

if (isset($_POST['submit'])) {
    $login = $conn->login($_POST['username'], $_POST['password']);

    if ($login) {
        $_SESSION['login'] = true;
        header("Location: /dashboard");
    }

    if (!$login) {
        echo "
            <script>
                alert('Credentials Invalid');
                window.location.href = '$_SERVER[PHP_SELF]';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>