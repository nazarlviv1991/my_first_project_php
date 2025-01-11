<?php

require __DIR__ . "/auth.php";

getUserLogin() ? $login = getUserLogin() : header("Location: index.php");

?>

<html lang="ua">

<head>
    <title>calculator</title>
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
        <h2>Калькулятор</h2>
        <form action="calkulator.php">
            <input type="text" name="x1">
            <select name="operation">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="x2">
            <input type="submit" value="Результат">
        </form>


        <?php

        if (!empty($_GET)) {

            require __DIR__ . "/backCalkulatora.php";

            $x1 = $_GET["x1"];
            $x2 = $_GET["x2"];
            $operation = $_GET["operation"];

            if (is_numeric($_GET["x1"]) && is_numeric($_GET["x2"]) && $operation) {
                $rezult =  calculator($x1, $x2, $operation);
        ?> <h2><?= $rezult; ?></h2>
            <?php
            } else {
                $rezult = perevirka($x1, $x2, $operation);
            ?>
                <h2>
                    <span style="color: red;">
                        <?= $rezult; ?>
                    </span>
                </h2>
            <?php
            }
        } else { ?>
            <h3>Введіть дані для обчислення</h3>
        <?php
        }
        ?>
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