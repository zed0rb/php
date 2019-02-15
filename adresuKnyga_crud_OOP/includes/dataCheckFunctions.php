<?php

function nameCheck($name) {
    $error = [true, ""];
    if (empty($name)) {
        $error[1] = "Įveskite Varda!";
        return $error;
    } else if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $name)) {
            $error[1] = "Įveskite tik raides!";
            return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}
function last_nameCheck($last_name) {
    $error = [true, ""];
    if (empty($last_name)) {
        $error[1] = "Įveskite Pavardę!";
        return $error;
    } else if (!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/", $last_name)) {
        $error[1] = "Įveskite tik raides!";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}
function numberCheck($number) {
    $error = [true, ""];
    if (empty($number)) {
        $error[1] = "Įveskite telefono numerį!";
        return $error;
    } else if (!preg_match("/^[0-9\-\(\)\/\+\s]*$/", $number)) {
        $error[1] = "Įveskite skaičių!";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}
