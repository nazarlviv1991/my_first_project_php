<?php

function perevirka($x1, $x2, $operation)
{
    if (empty($_GET["operation"])) {
        return "Операцію не вибрано";
    } else {
        $operation = $_GET["operation"];
    }

    if (!is_numeric($_GET["x1"]) && !is_numeric($_GET["x2"])) {
        return "Введіть числа";
    }

    if (!is_numeric($_GET["x1"])) {
        return "Перше число введене не коректно";
    } else {
        $x1 = (float)$_GET["x1"];
    }

    if (!is_numeric($_GET["x2"])) {
        return "Друге число введене не коректно";
    } else {
        $x2 = (float)$_GET["x2"];
    }
}


function calculator($x1, $x2, $operation)
{

    $vyraz = $x1 . " " . $operation . " " . $x2  . " = ";

    switch ($operation) {
        case "+":
            $result = $x1 + $x2;
            break;
        case "-":
            $result = $x1 - $x2;
            break;
        case "*":
            $result = $x1 * $x2;
            break;
        case "/":
            if ($x2 == 0)
                return "Ділення на нуль - не можливе";
            else
                $result = $x1 / $x2;
            break;
        default:
            return "Операція не підтримується";
    }

    return $vyraz . $result . "<br>";
}
