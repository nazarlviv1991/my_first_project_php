<?php

require __DIR__ . "/auth.php";
getUserLogin() ? $login = getUserLogin() : header("Location: index.php");

if (!empty($_FILES)) {
    $file = $_FILES["photoUser"];
    $newFilePath = __DIR__ . "/uploads/" . $file["name"];

    if ($file["error"] === 1) {
        $error = "Файл завеликий! Максимальний розмір 10Mb.";
    } elseif ($file["error"] === 4) {
        $error = "Файл не вибраний! Виберіть фото.";
    } elseif ($file["error"] !== 0) {
        $error = "Помилка при завантаженні файлу!";
    } elseif (file_exists($newFilePath)) {
        $error = "Файл з таким іменем вже існує!";
    } elseif (!getimagesize($file["tmp_name"])) {
        $error = "Файл не є зображенням, або файл пошкодженний!";
    } elseif (getimagesize($file["tmp_name"])[2] > 3) {
        $error = "Цей формат зображення не підтримується! Потрібні формати: GIF, JPEG, PNG";
    } elseif (!move_uploaded_file($file["tmp_name"], $newFilePath)) {
        $error = "Помилка при заванатаженні файлу на сервер!";
    } else {
        $rezult = "Фото успішно завантаженно!";
        $newFilePathServ = "/uploads/" . $file["name"];

        date_default_timezone_set("Europe/Kiev");
$date = date('Y-m-d H:i');

        $newImg = "[" . $date ."]" . " " . "[" . $login . "]" . " " . $file["name"] . "\n";
        $file = fopen("admin/img_info.txt", "a");
fwrite($file, $newImg);
fclose($file);
    }
}

?>

<html lang="ua">

<head>
    <title>Upload img</title>
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
            <li><a href="pets.php">Наші улюбленці</a></li>
        </ul>
    </nav>
    <main>
        <h4>Користувач, <?= $login ?></h4>
        <hr>
        <h2>Завантажте фото свого домашнього улюбленця</h2>

        <form class="inputReg" action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photoUser">
            <br>
            <input type="submit">
        </form>
        <?php if (!empty($error)) : ?>
            <span style="color: red;">
                <strong>
                    <h3> <?= $error; ?> </h3>
                </strong>
            <?php elseif (!empty($rezult)) : ?>
                <h3> <?= $rezult; ?> </h3>
                <hr>
                <img class="imgLoad" src="<?= $newFilePathServ ?>" alt="Фото домашнього улюбленця">
            <?php endif; ?>
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

<?php

