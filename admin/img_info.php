<?php

require __DIR__ . "/../auth.php";

getUserLogin() ? $login = getUserLogin() : header("Location: ../index.php");

if ($login !== "admin") {
    header("Location: ../index.php");
}

if (!file_exists("img_info.txt")) {
    $error = "Файл з записами про заванатаження забраженнь не знайдено";
} else {
    $fileRead = file("img_info.txt", FILE_IGNORE_NEW_LINES);
    $kilkist = count($fileRead);
}

?>

<html lang="ua">

<head>
    <title>Info images</title>
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
        <h2>Інформація про завантаженні зображення</h2>
        <?php if (isset($error)) : ?>
            <span style="color: red;">
                <h2><?= $error; ?></h2>
            </span>
        <?php else: ?>
            <h4>Завантаженно зображеннь на сайт - <?= $kilkist ?> </h4>
            <?php
            foreach ($fileRead as $key => $line) :

                $parts = explode("] ", $line, 3);
            ?>
                <h4> <?php echo substr($parts[0], 1) . " -- " . htmlspecialchars(substr($parts[1], 1)) ?> </h4>
                <a href="<?php echo "../uploads/" . $parts[2] ?>" target="_blank">
                    <img class="imgAdm" src="<?php echo "../uploads/" . $parts[2] ?>" alt="Фото користувача"> </a>
                <?php echo htmlspecialchars($parts[2]) ?>
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