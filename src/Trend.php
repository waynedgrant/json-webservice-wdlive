<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Trend {

    private $trend;

    public function __construct($trend) {
        if ($trend != '-') {
            $this->trend = number_format($trend, 1, '.', '');

            if ($trend > 0) {
                $this->trend = "1";
            } else if ($trend < 0) {
                $this->trend = "-1";
            } else {
                $this->trend = "0";
            }
        }
    }

    public function getTrend() {
        return $this->trend;
    }
}

?>
