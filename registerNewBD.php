<?php

if (!empty($_POST)) {
  
$newUser = $_POST["login"] . " " . $_POST["password"] . "\n";

$file = fopen("admin/bd.txt", "a");
fwrite($file, $newUser);
fclose($file);

require __DIR__ . "/auth.php";

$login = $_POST["login"] ?? "";
$password = $_POST["password"] ?? "";

if (checkAuth($login, $password)) {
setcookie("login", $login, 0, "/");
setcookie("password", $password, 0, "/");
setcookie("newUser", "newUser", 0, "/");
header("Location: index.php");
}
}