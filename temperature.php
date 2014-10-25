<?php

    # Copyright 2014 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_temperature_celsius($temperature_celsius)
    {        
        if ($temperature_celsius == '-')
        {
            $temperature_celsius = null;
        }
        else
        {
            $temperature_celsius = number_format($temperature_celsius, 1, '.', '');
        }

        return $temperature_celsius;
    }    

    function get_temperature_fahrenheit($temperature_celsius)
    {
        $temperature_fahrenheit = null;

        if ($temperature_celsius != '-')
        {
            $temperature_fahrenheit = number_format((($temperature_celsius * 1.8) + 32), 1, '.', '');
        }

        return $temperature_fahrenheit;
    }

    function get_temperature_item($client_raw_fields, $temperature_field)
    {
        return array(
            "c" => get_temperature_celsius(read_client_raw_field($client_raw_fields, $temperature_field)),
            "f" => get_temperature_fahrenheit(read_client_raw_field($client_raw_fields, $temperature_field)));
    }
    
?>
