<?php

require __DIR__ . "/../auth.php";

getUserLogin() ? $login = getUserLogin() : header("Location: ../index.php");

if ($login !== "admin") {
    header("Location: ../index.php");
}

if (!file_exists("bd.txt")) {
    $error = "База даних не знайдена";
} else {

    $usersBd = [];

    $fileBd = file("bd.txt", FILE_IGNORE_NEW_LINES);
    $kilkist = count($usersBd);

    foreach ($fileBd as $val) {
        $asoc = [];
        $mass = explode(" ", $val);

        foreach ($mass as $key => $v) {
            if ($key == 0)
                $asoc["login"] = "$v";
            else
                $asoc["password"] = $v;
        }

        $usersBd[] = $asoc;
    }

    $kilkist = count($usersBd);
}

?>

<html lang="ua">

<head>
    <title>Info users</title>
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
        <h2>Інформація про користувачів</h2>
        <?php if (isset($error)) : ?>
            <span style="color: red;">
                <h2><?= $error; ?></h2>
            </span>
        <?php else: ?>
            <h4>Зареєстровано користувачів на сайті - <?= $kilkist ?> </h4>
            <?php
            foreach ($usersBd as $user) :
            ?> <h4> <?php echo $user["login"] . " - " . $user["password"] ?> </h4>
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