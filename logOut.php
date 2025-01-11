<?php

if (!empty($_COOKIE)) {
    
    require __DIR__ . "/auth.php";

    if (checkAuth($_COOKIE["login"], $_COOKIE["password"])) {
        setcookie("login", "", time() -10, "/");
        setcookie("password", "", time() -10, "/");
        setcookie("newUser", "", time() -10, "/");
        header("Location: index.php");
    }
}
