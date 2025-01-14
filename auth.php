<?php

function checkAuth(string $login, string $password): bool
{
    $users = require __DIR__ . "/usersBD.php";

    foreach ($users as $user) {
        if ($user["login"] === $login && $user["password"] === $password)
            return true;
    }
    return false;
}

function getUserLogin(): ?string
{
    $loginFromCookie = $_COOKIE["login"] ?? "";
    $passwordFromCookie = $_COOKIE["password"] ?? "";

    if (checkAuth($loginFromCookie, $passwordFromCookie)) {
        return htmlspecialchars($loginFromCookie);
    }
    return null;
}

function newUser(): ?string
{
    if (!empty($_COOKIE["newUser"])) {

        setcookie("newUser", "", time() - 10, "/");
        return "Реєстрація успішна !";
    } else {
        return null;
    }
}

function links()
{
    $files = scandir(__DIR__ . "/uploads/");
    $links = [];

    foreach ($files as $fileName) {
        if ($fileName == "." || $fileName == "..") {
            continue;
        }
        $links[] = "/uploads/" . $fileName;
    }
    return $links;
}

function newImg ()
{
    
}