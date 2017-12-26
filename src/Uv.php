<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Uv {

    private $uvi;
    private $uviDescription;

    public function __construct($uvi) {
        if ($uvi != '-') {
            $this->uvi = number_format($uvi, 1, '.', '');
            $this->uviDescription = self::calculateUviDescription($uvi);
        }
    }

    public function getUvi() {
        return $this->uvi;
    }

    public function getUviDescription() {
        return $this->uviDescription;
    }

    private function calculateUviDescription($uvi) {
        if ($uvi < 3) {
            $uviDescription = 'low';
        } elseif ($uvi < 6) {
            $uviDescription = 'moderate';
        } elseif ($uvi < 8) {
            $uviDescription = 'high';
        } elseif ($uvi < 11) {
            $uviDescription = 'very high';
        } else {
            $uviDescription = 'extreme';
        }

        return $uviDescription;
    }

    public function getAllMeasures() {
        return array(
            "uvi" => $this->getUvi(),
            "description" => $this->getUviDescription());
    }
}

?>
