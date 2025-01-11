<?php

if (!file_exists(__DIR__ . "/admin/bd.txt")) {
    return "error";
} else {
    
    $usersBd = [];

    $fileBd = file(__DIR__ . "/admin/bd.txt", FILE_IGNORE_NEW_LINES);


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

    return $usersBd;
}

?>









