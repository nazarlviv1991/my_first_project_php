<?php

require __DIR__ . "/auth.php";

$login = getUserLogin();
$newUser = newUser();


if (!empty(links())) {
    $randPhoto = links()[mt_rand(0, count(links()) - 1)];
}

?>

<html lang="ua">

<head>
    <title>Golovna storinka</title>
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
        <?php if ($login === null): ?>
            <h2>Вітаю на мому PHP проекті !</h2>
            <hr>
            <h4><a href="login.php">Увійти</a></h4>
            <h4><a href="reestraciya.php">Зареєструватись</a></h4>
            <hr>
            <?php if (!empty($randPhoto)) : ?>
                <div class="imgIndex">
                    <img src="<?= $randPhoto ?>" alt="Фото домашнього улюбленця">
                </div>
            <?php endif ?>
        <?php else: ?>
            <?php if ($newUser !== null) ?>
            <h3><?= $newUser ?></h3>
            <h2>Ласкаво просимо, <?= $login ?></h2>
            <hr>
            <ul>
                <li> <a href="calkulator.php">
                        <h3>Калькулятор</h3>
                    </a>
                </li>

                <li> <a href="pets.php">
                        <h3>Наші улюбленці</h3>
                    </a>
                </li>

                <?php if ($login === "admin") { ?>
                    <li> <a href="admin/adminPanel.php">
                            <h3>Адмін панель</h3>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <hr>
            <a href="feedback.php">Залишити відгук</a>
            <br>
            <a href="logOut.php">Вихід</a>
        <?php endif; ?>
        <br>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>