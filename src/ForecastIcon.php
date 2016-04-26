<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class ForecastIcon
{
    private $code;
    private $text;

    public function __construct($code)
    {
        if ($code != '-')
        {
            $this->code =$code;
            $this->text = $this->lookupTextForCode($code);
        }
    }

    private function lookupTextForCode($code) {

        $text = 'Unknown';

        switch ($code) {
            case 0: $text = 'Sunny'; break;
            case 1: $text = 'Clear Night'; break;
            case 2: $text = 'Cloudy'; break;
            case 3: $text = 'Mainly Fine'; break;
            case 4: $text = 'Cloudy Night'; break;
            case 5: $text = 'Dry'; break;
            case 6: $text = 'Fog'; break;
            case 7: $text = 'Hazy'; break;
            case 8: $text = 'Heavy Rain'; break;
            case 9: $text = 'Mainly Fine'; break;
            case 10: $text = 'Mist'; break;
            case 11: $text = 'Night Fog'; break;
            case 12: $text = 'Night Heavy Rain'; break;
            case 13: $text = 'Night Overcast'; break;
            case 14: $text = 'Night Rain'; break;
            case 15: $text = 'Night Showers'; break;
            case 16: $text = 'Night Snow'; break;
            case 17: $text = 'Night Thunder'; break;
            case 18: $text = 'Overcast'; break;
            case 19: $text = 'Mainly Cloudy'; break;
            case 20: $text = 'Rain'; break;
            case 22: $text = 'Light Rain'; break;
            case 22: $text = 'Showers'; break;
            case 23: $text = 'Sleet'; break;
            case 24: $text = 'Sleet Showers'; break;
            case 25: $text = 'Snow'; break;
            case 26: $text = 'Snow Melt'; break;
            case 27: $text = 'Snow Showers'; break;
            case 28: $text = 'Sunny'; break;
            case 29: $text = 'Thunder Showers'; break;
            case 30: $text = 'Thunder Showers'; break;
            case 31: $text = 'Thunderstorms'; break;
            case 32: $text = 'Tornado'; break;
            case 33: $text = 'Windy'; break;
            case 34: $text = 'Stopped Raining'; break;
            case 35: $text = 'Windy Rain'; break;
        }

        return $text;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAllMeasures()
    {
        return array(
            "code" => $this->getCode(),
            "text" => $this->getText());
    }
}

?>
