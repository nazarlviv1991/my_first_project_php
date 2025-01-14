<?php

require __DIR__ . "/../auth.php";

getUserLogin() ? $login = getUserLogin() : header("Location: ../index.php");

if ($login !== "admin") {
    header("Location: ../index.php");
}

if (!file_exists("feedbacks.txt")) {
    $error = "Файл з записами відгуків не знайдено";
} else {

    $usersFeed = explode("}", trim(file_get_contents("feedbacks.txt")));
    $usersFeed = array_filter($usersFeed);
    $kilkist = count($usersFeed);

}

?>

<html lang="ua">

<head>
    <title>Info feedbacks</title>
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
            <li><a href="adminPanel.php">Адмін панель</a></li>
        </ul>
    </nav>
    <main>
        <h4>Користувач, <?= $login ?></h4>
        <hr>
        <h2>Відгуки користувачів</h2>
        <?php if (isset($error)) : ?>
            <span style="color: red;">
                <h2><?= $error; ?></h2>
            </span>
        <?php else: ?>
            <h3>Залишенно відгуків - <?= $kilkist ?> </h3>
            <?php
            foreach ($usersFeed as $key => $line) :

                $parts = explode("]", trim($line), 3);
            ?>
                <h4> <?php echo substr($parts[0], 1) . " -- " . htmlspecialchars(substr($parts[1], 2)) ?> </h4>
                <h4><pre><?= htmlspecialchars(substr($parts[2], 2)) ?></pre></h4>
                <?php if ($key < $kilkist - 1) : ?>
                    <hr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr>
        <a href="../logOut.php">Вихід</a>
        <br>
        <br>
    </main>
    <footer>
        Всі права захищені:)
    </footer>
</body>

</html>