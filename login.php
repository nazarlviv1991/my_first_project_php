<?php

if (!empty($_POST)) {
    require __DIR__ . "/auth.php";

    $login = $_POST["login"] ?? "";
    $password = $_POST["password"] ?? "";

    if (checkAuth($login, $password)) {
        setcookie("login", $login, 0, "/");
        setcookie("password", $password, 0, "/");
        header("Location: index.php");
    } else {
        $error = "Помилка авторизації !!!";
    }
}

if (!empty($_COOKIE)) {
    require __DIR__ . "/auth.php";
    if (checkAuth($_COOKIE["login"], $_COOKIE["password"])) {
        header("Location: index.php");
    }
}

?>

<html lang="ua">

<head>
    <title>Forma Avtorizaciyi</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="project">
        <h1>
            < My project >
        </h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Головна</a></li>
        </ul>
    </nav>
    <main>
        <h2>Вхід</h2>
        <hr>
        <?php if (isset($error)) : ?>
            <span style="color: red;">
                <strong>
                    <h3> <?= $error; ?> </h3>
                </strong>
            </span>
        <?php endif; ?>
        <form class="inputReg" action="login.php" method="post">
            <label for="login">Ім'я користувача</lebel> <input type="text" name="login" id="login">
                <br>
                <label for="password">Пароль</lebel> <input type="password" name="password" id="password">
                    <br>
                    <input type="submit" value="Увійти">
        </form>
        <br>
        <br>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>