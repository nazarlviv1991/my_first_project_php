<?php

if (!empty($_COOKIE)) {
    require __DIR__ . "/auth.php";
    if (checkAuth($_COOKIE["login"], $_COOKIE["password"])) {
        header("Location: index.php");
    }
}

?>

<html lang="ua">

<head>
    <title>Register form</title>
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
        <h2>Реєстрація</h2>
        <hr>
        <form class="inputReg" action="registerNewBD.php" method="post">
            <label>
                Ім'я користувача <input type="text" name="login">
            </label>
            <br>
            <label>
                Пароль <input type="password" name="password">
            </label>
            <br>
            <input type="submit" value="Зареєструватись">
        </form>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>