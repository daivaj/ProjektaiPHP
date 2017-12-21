<?php
require_once ('Trimestras.php');

class Mokinys extends Trimestras
{

    public $vardas;
    public $pavarde;

    function __construct($vardas, $pavarde, $dalykai)
    {
        parent::__construct($dalykai);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    function pilnasVardas()
    {
        return $this->vardas . ' ' . $this->pavarde;
    }
}

