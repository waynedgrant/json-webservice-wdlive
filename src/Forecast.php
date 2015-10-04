<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Forecast // TODO - test
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
            case 1: $text = 'Sunny'; break;
            case 2: $text = 'Clear Night'; break;
            case 3: $text = 'Cloudy'; break;
            case 4: $text = 'Cloudy'; break;
            case 5: $text = 'Cloudy Night'; break;
            case 6: $text = 'Dry Clear'; break;
            case 7: $text = 'Fog'; break;
            case 8: $text = 'Hazy'; break;
            case 9: $text = 'Heavy Rain'; break;
            case 10: $text = 'Mainly Fine'; break;
            case 11: $text = 'Misty'; break;
            case 12: $text = 'Night Fog'; break;
            case 13: $text = 'Night Heavy Rain'; break;
            case 14: $text = 'Night Overcast'; break;
            case 15: $text = 'Night Rain'; break;
            case 16: $text = 'Night Showers'; break;
            case 17: $text = 'Night Snow'; break;
            case 18: $text = 'Night Thunder'; break;
            case 19: $text = 'Overcast'; break;
            case 20: $text = 'Partly Cloudy'; break;
            case 21: $text = 'Rain'; break;
            case 22: $text = 'Hard Rain'; break;
            case 23: $text = 'Showers'; break;
            case 24: $text = 'Sleet'; break;
            case 25: $text = 'Sleet Showers'; break;
            case 26: $text = 'Snowing'; break;
            case 27: $text = 'Snow Melt'; break;
            case 28: $text = 'Snow Showers'; break;
            case 29: $text = 'Sunny'; break;
            case 30: $text = 'Thunder Showers'; break;
            case 31: $text = 'Thunder Showers'; break;
            case 32: $text = 'Thunderstorms'; break;
            case 33: $text = 'Tornado Warning'; break;
            case 34: $text = 'Windy'; break;
            case 35: $text = 'Stopped Raining'; break;
            case 36: $text = 'Windy Rain'; break;
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
}

?>
