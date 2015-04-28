<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class RainfallRate
{
    private $inchesPerMinutePerMinute;
    private $millimetresPerMinute;

    public function __construct($millimetresPerMinute)
    {
        if ($millimetresPerMinute != '-')
        {
            $this->inchesPerMinute = number_format(($millimetresPerMinute * (1 / 25.4)), 3, '.', '');
            $this->millimetresPerMinute = number_format($millimetresPerMinute, 2, '.', '');
        }
    }

    public function getInchesPerMinute()
    {
        return $this->inchesPerMinute;
    }

    public function getMillimetresPerMinute()
    {
        return $this->millimetresPerMinute;
    }
}

?>
