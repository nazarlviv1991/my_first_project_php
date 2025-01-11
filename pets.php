<?php

require __DIR__ . "/auth.php";
getUserLogin() ? $login = getUserLogin() : header("Location: index.php");

?>

<html lang="ua">

<head>
    <title>Our pets</title>
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
        <h4>Користувач, <?= $login ?></h4>
        <hr>
        <h2>Наші домашні улюбленці</h2>
        <?php foreach (links() as $link) : ?>
            <a href="<?= $link ?>" target="_blank"> <img src="<?= $link ?>" alt="Фото домашнього улюбленця"> </a>
        <?php endforeach; ?>

        <a href="upload.php">
            <h3>Поділитись своїм улюблинцем</h3>
        </a>
        <hr>
        <a href="feedback.php">Залишити відгук</a>
        <br>
        <a href="logOut.php">Вихід</a>
        <br>
        <br>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>