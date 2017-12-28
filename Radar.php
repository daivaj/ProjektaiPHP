<?php
class Radar
{
    public $data;
    public $number;
    private $distance;
    private $time;
    public $speed;
    
    public function __construct($data, $number, $distance, $time)
    {
        $this->data = $data;
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }

    public function getDistance(){
        return $this->distance;
    }

    public function autoSpeed(){
            $this->speed = round($this->distance / $this->time, 1);
            return $this->speed;
    }

    public function getSpeed(){
        if ($this->speed == null){
            $this->autoSpeed();
        }
        return $this->speed;
    }
}
