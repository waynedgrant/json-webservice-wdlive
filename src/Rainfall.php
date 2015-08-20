<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Rainfall
{
    private $inches;
    private $millimetres;

    public function __construct($millimetres)
    {
        if ($millimetres != '-')
        {
            $this->inches = number_format(($millimetres * (1 / 25.4)), 2, '.', '');
            $this->millimetres = number_format($millimetres, 2, '.', '');
        }
    }

    public function getInches()
    {
        return $this->inches;
    }

    public function getMillimetres()
    {
        return $this->millimetres;
    }
    
    public function getAllMeasures()
    {
        return array(
            "in" => $this->getInches(),
            "mm" => $this->getMillimetres());
    }
}

?>
