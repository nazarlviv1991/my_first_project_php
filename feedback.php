<?php

require __DIR__ . "/auth.php";
getUserLogin() ? $login = getUserLogin() : header("Location: index.php");

$text = $_POST["text"] ?? "";

if (!empty($text)) {

    date_default_timezone_set("Europe/Kiev");
    $date = date('Y-m-d H:i');

    $feedback = "[" . $date . "]" . " " . "[" . $login . "]" . "\n" . "{" . $text . "\n}\n";

    $file = fopen("admin/feedbacks.txt", "a");
    $zapis = fwrite($file, $feedback);
    fclose($file);

    if ($zapis !== false) {
        $result = "Ваш відгук успішно відправлено!";
    } else {
        $error = "Виникла помилка при завантаженні відгуку!";
    }
}

?>

<html lang="ua">

<head>
    <title>Відгук</title>
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
        <h2>Тут ви можете залишити свій відгук про сайт!</h2>

        <?php if (!empty($text)) : ?>
            <?php if (isset($result)) : ?>
                <h3> <?= $result; ?> </h3>
            <?php else : ?>
                <span style="color: red;">
                    <strong>
                        <h3> <?= $error; ?> </h3>
                    </strong>
                </span>
            <?php endif; ?>
        <?php endif; ?>

        <form action="feedback.php" method="post">
            <label for="text">Введіть ваш текст:</label>
            <br>
            <textarea name="text" id="text" cols="65" rows="7"></textarea>
            <br>
            <input type="submit">
        </form>

        <hr>
        <a href="logOut.php">Вихід</a>
        <br>
        <br>
    </main>
    <footer>
        Всі права захищені :)
    </footer>
</body>

</html>