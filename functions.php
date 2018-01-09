<?php
function puslapiavimas($puslapis, $visoIrasu, $ip){

    $button = '';
    if (!empty($_GET['button']))$button='&button='.$_GET['button'];
    if ($puslapis > 0){
        echo '<a href="?puslapis='.($puslapis-1).$button.'" >Atgal</a>';
    }
    $viso = ceil($visoIrasu/$ip);
    for ($i = 0; $i < $viso; $i++){
        $stilius = '';
        if ($i == $puslapis){
            $stilius = 'active';
        }
        echo '<a class="'.$stilius.'" href="?puslapis=' .($i).$button.'" >'.($i+1).'</a>';
    }
    if ($viso > $puslapis+1){
        echo '<a href="?puslapis=' .($puslapis+1).$button.'" >Pirmyn</a>';
    }
}
