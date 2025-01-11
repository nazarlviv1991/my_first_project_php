<?php

require __DIR__ . "/../auth.php";

getUserLogin() ? $login = getUserLogin() : header("Location: ../index.php");

if ($login !== "admin") {
    header("Location: ../index.php");
}

?>

<html lang="ua">

<head>
    <title>Admin panel</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="project">
        <h1>
            < My project >
        </h1>
    </div>
    <nav>
        <ul>
            <li><a href="../index.php">Головна</a></li>
        </ul>
    </nav>
    <main>
        <h4>Користувач, <?= $login ?></h4>
        <hr>
        <h2>Адмін панель</h2>
       <h4> <a href="usersInfo.php">Інформація про користувачів</a> </h4>
        <h4> <a href="img_info.php">Інформація про завантаженні зображення</a> </h4>
        <h4> <a href="feedbacks_info.php">Відгуки користувачів</a> </h4>
        <hr>
        <a href="../logOut.php">Вихід</a>
        <br>
        <br>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>