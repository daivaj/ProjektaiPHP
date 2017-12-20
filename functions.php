<?php

function averageStudent($a)
{
    $suma = 0;
    $count = 0;
    foreach ($a['pazymiai'] as $dalykai) {
        foreach ($dalykai as $key => $value) {
            $suma += $value;
            $count++;
        }
    }
    return round($suma / $count, 1);
}

