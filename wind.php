<?php

    # Copyright 2015 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_wind_direction_cardinal($wind_direction_degrees)
    {
        $wind_direction_cardinal = null;

        if ($wind_direction_degrees != '-')
        {
            $cardinal = array('N','NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW','SW', 'WSW', 'W', 'WNW', 'NW', 'NNW');
            $wind_direction_cardinal = $cardinal[fmod((($wind_direction_degrees + 11) / 22.5), 16)];
        }

        return $wind_direction_cardinal;
    }

    function get_wind_direction_degrees($wind_direction_degrees)
    {
        if ($wind_direction_degrees == '-')
        {
            $wind_direction_degrees = null;
        }
        else
        {
            $wind_direction_degrees = number_format($wind_direction_degrees, 0, '.', '');
        }

        return $wind_direction_degrees;
    }

    function get_wind_direction_item($client_raw_fields, $wind_direction_field)
    {
        return array(
            "cardinal" => get_wind_direction_cardinal(read_client_raw_field($client_raw_fields, $wind_direction_field)),
            "degrees" => get_wind_direction_degrees(read_client_raw_field($client_raw_fields, $wind_direction_field)));
    }

    function get_wind_speed_bft($wind_speed_kn)
    {
        $wind_speed_bft = null;

        if ($wind_speed_kn != '-')
        {
            $rounded_kn = round($wind_speed_kn, 0, PHP_ROUND_HALF_UP);

            $wind_speed_bft = 0;

            if ($rounded_kn >= 1 && $rounded_kn <= 3)
    	    {
    	        $wind_speed_bft = 1;
    	    }
    	    elseif ($rounded_kn >= 4 && $rounded_kn <= 6)
    	    {
    	        $wind_speed_bft = 2;
    	    }
            elseif ($rounded_kn >= 7 && $rounded_kn <= 10)
            {
                $wind_speed_bft = 3;
            }
            elseif ($rounded_kn >= 11 && $rounded_kn <= 16)
            {
                $wind_speed_bft = 4;
            }
            elseif ($rounded_kn >= 17 && $rounded_kn <= 21)
            {
                $wind_speed_bft = 5;
            }
            elseif ($rounded_kn >= 22 && $rounded_kn <= 27)
            {
                $wind_speed_bft = 6;
            }
            elseif ($rounded_kn >= 28 && $rounded_kn <= 33)
            {
                $wind_speed_bft = 7;
            }
            elseif ($rounded_kn >= 34 && $rounded_kn <= 40)
            {
                $wind_speed_bft = 8;
            }
            elseif ($rounded_kn >= 41 && $rounded_kn <= 47)
            {
                $wind_speed_bft = 9;
            }
            elseif ($rounded_kn >= 48 && $rounded_kn <= 55)
            {
                $wind_speed_bft = 10;
            }
            elseif ($rounded_kn >= 56 && $rounded_kn <= 63)
            {
                $wind_speed_bft = 11;
            }
            elseif ($rounded_kn >= 64)
            {
                $wind_speed_bft = 12;
            }

            $wind_speed_bft = number_format($wind_speed_bft, 0, '.', '');
        }

        return $wind_speed_bft;
    }

    function get_wind_speed_kn($wind_speed_kn)
    {
        if ($wind_speed_kn == '-')
        {
            $wind_speed_kn = null;
        }
        else
        {
            $wind_speed_kn = number_format($wind_speed_kn, 1, '.', '');
        }

        return $wind_speed_kn;
    }

    function get_wind_speed_kmh($wind_speed_kn)
    {
        $wind_speed_kmh = null;

        if ($wind_speed_kn != '-')
        {
            $wind_speed_kmh = number_format(($wind_speed_kn * 1.852), 1, '.', '');
        }

        return $wind_speed_kmh;
    }

    function get_wind_speed_mph($wind_speed_kn)
    {
        $wind_speed_mph = null;

        if ($wind_speed_kn != '-')
        {
            $wind_speed_mph = number_format(($wind_speed_kn * 1.15078), 1, '.', '');
        }

        return $wind_speed_mph;
    }

    function get_wind_speed_ms($wind_speed_kn)
    {
        $wind_speed_ms = null;

        if ($wind_speed_kn != '-')
        {
            $wind_speed_ms = number_format(($wind_speed_kn * 0.514444), 1, '.', '');
        }

        return $wind_speed_ms;
    }

    function get_wind_speed_item($client_raw_fields, $wind_direction_field)
    {
        return array(
                "bft" => get_wind_speed_bft(read_client_raw_field($client_raw_fields, $wind_direction_field)),
                "kn" => get_wind_speed_kn(read_client_raw_field($client_raw_fields, $wind_direction_field)),
                "kmh" => get_wind_speed_kmh(read_client_raw_field($client_raw_fields, $wind_direction_field)),
                "mph" => get_wind_speed_mph(read_client_raw_field($client_raw_fields, $wind_direction_field)),
                "ms" => get_wind_speed_ms(read_client_raw_field($client_raw_fields, $wind_direction_field)));
    }

?>
