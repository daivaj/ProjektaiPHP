<?php
require_once('Trimestras.php');

class Mokinys extends Trimestras
{

    public $vardas;
    public $pavarde;
    public $gimimoData;
    public $amzius;

    function __construct($vardas, $pavarde, $gimimoData, $dalykai)
    {
        parent::__construct($dalykai);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->gimimoData = $gimimoData;
    }

    function pilnasVardas()
    {
        return $this->vardas . ' ' . $this->pavarde;
    }

    function amzius()
    {
            $date = new DateTime($this->gimimoData);
            $now = new DateTime(date('Y-m-d'));
            $interval = $now->diff($date);
            $this->amzius = $interval->y;
            return $this->amzius;
    }
}
