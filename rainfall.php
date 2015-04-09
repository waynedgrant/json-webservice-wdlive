<?php

    # Copyright 2014 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_rainfall_in($rainfall_mm)
    {
        $rainfall_in = null;

        if ($rainfall_mm != '-')
        {
            $rainfall_in = number_format(($rainfall_mm * (1 / 25.4)), 2, '.', '');
        }

        return $rainfall_in;
    }

    function get_rainfall_mm($rainfall_mm)
    {
        if ($rainfall_mm == '-')
        {
            $rainfall_mm = null;
        }
        else
        {
            $rainfall_mm = number_format($rainfall_mm, 2, '.', '');
        }

        return $rainfall_mm;
    }

    function get_rainfall_item($client_raw_fields, $rainfall_field)
    {
        return array(
            "in" => get_rainfall_in(read_client_raw_field($client_raw_fields, $rainfall_field)),
            "mm" => get_rainfall_mm(read_client_raw_field($client_raw_fields, $rainfall_field)));
    }

    function get_rainfall_rate_in_min($rainfall_rate_mm_min)
    {
        $rainfall_rate_in_min = null;

        if ($rainfall_rate_mm_min != '-')
        {
            $rainfall_rate_in_min = number_format(($rainfall_rate_mm_min * (1 / 25.4)), 3, '.', '');
        }

        return $rainfall_rate_in_min;
    }

    function get_rainfall_rate_mm_min($rainfall_rate_mm_min)
    {
        if ($rainfall_rate_mm_min == '-')
        {
            $rainfall_rate_mm_min = null;
        }
        else
        {
            $rainfall_rate_mm_min = number_format($rainfall_rate_mm_min, 2, '.', '');
        }

        return $rainfall_rate_mm_min;
    }

    function get_rainfall_rate_item($client_raw_fields, $rainfall_rate_field)
    {
        return array(
            "in" => get_rainfall_rate_in_min(read_client_raw_field($client_raw_fields, $rainfall_rate_field)),
            "mm" => get_rainfall_rate_mm_min(read_client_raw_field($client_raw_fields, $rainfall_rate_field)));
    }

?>
