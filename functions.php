<?php
function lentele($auto){
    foreach ($auto as $info) {
        echo '<tr><td>' . $info->data. '</td>';
        echo '<td>'.$info->number. '</td>';
        echo '<td>'.$info->getDistance(). '</td>';
        echo '<td>'.$info->getTime(). '</td>';
        echo '<td>'.$info->getSpeed(). '</td>';
        echo '<td>'.$info->getSpeed()*3.6. '</td></tr>';
    }
}
