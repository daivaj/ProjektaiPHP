<?php

function mazejimas($a){
    $vidurkiai = [];
    $surikiuoti = [];

    foreach ($a as $key => $mokinys){
        $mokinys->vidurkis();
        $vidurkiai[] = $mokinys;
    }

    for ($j = 0; 0 < count($vidurkiai); $j++){
        $max = $vidurkiai[0]->trimVid;
        $index = 0;
        for ($i = 0; $i < count($vidurkiai); $i++) {
            if ($vidurkiai[$i]->trimVid > $max){
                $max = $vidurkiai[$i]->trimVid;
                $index = $i;
            }
        }
        $surikiuoti[] = $vidurkiai[$index];
        array_splice($vidurkiai, $index, 1);
    }
    return $surikiuoti;
}

function lentele($mokiniai){
    foreach ($mokiniai as $mokinioInfo) {
        echo '<tr><td>' . $mokinioInfo->vardas. '</td>';
        echo '<td>'.$mokinioInfo->pavarde. '</td>';

        echo '<td>'.$mokinioInfo->trimVid. '</td></tr>';

    }
}

