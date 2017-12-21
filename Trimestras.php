<?php

class Trimestras
{
    public $dalykai;
    public $trimVid;

    function __construct($dalykas)
    {
        $this->dalykai = $dalykas;
    }
    
    function vidurkis(){
        $sum = 0;
        $count = 0;
        foreach ($this->dalykai as $pazymiai){
            foreach ($pazymiai as $pazymys){
                $sum += $pazymys;
                $count++;
            }
        }
        $this->trimVid = round($sum / $count, 1);
        return $this->trimVid;
    }
    
}
