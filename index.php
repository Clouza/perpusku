<?php

$uri = $_SERVER['REQUEST_URI'];

if ($uri == "/") {
    header("Location: /public/index.php");
    exit;
}

if ($uri == "/dashboard") {
    header("Location: /app/views/dashboard.php");
    exit;
}

if ($uri == "/add") {
    header("Location: /app/views/add.php");
    exit;
}

if ($uri == "/login") {
    header("Location: /app/views/login.php");
    exit;
}

if ($uri == "/logout") {
    header("Location: /app/views/logout.php");
    exit;
}
