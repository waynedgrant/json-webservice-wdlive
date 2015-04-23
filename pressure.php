<?php

    # Copyright 2015 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_pressure_hpa($pressure_hpa)
    {
        if ($pressure_hpa == '-')
        {
            $pressure_hpa = null;
        }
        else
        {
            $pressure_hpa = number_format($pressure_hpa, 1, '.', '');
        }

        return $pressure_hpa;
    }

    function get_pressure_inhg($pressure_hpa)
    {
        $pressure_inhg = null;

        if ($pressure_hpa != '-')
        {
            $pressure_inhg = number_format(($pressure_hpa * 0.02953), 2, '.', '');
        }

        return $pressure_inhg;
    }

    function get_pressure_kpa($pressure_hpa)
    {
        $pressure_kpa = null;

        if ($pressure_hpa != '-')
        {
            $pressure_kpa = number_format(($pressure_hpa / 10), 2, '.', '');
        }

        return $pressure_kpa;
    }

    function get_pressure_mb($pressure_hpa)
    {
        if ($pressure_hpa == '-')
        {
            $pressure_mb = null;
        }
        else
        {
            $pressure_mb = number_format($pressure_hpa, 1, '.', '');
        }

        return $pressure_mb;
    }

    function get_pressure_mmhg($pressure_hpa)
    {
        $pressure_mmhg = null;

        if ($pressure_hpa != '-')
        {
            $pressure_mmhg = number_format(($pressure_hpa * 0.750062), 1, '.', '');
        }

        return $pressure_mmhg;
    }

    function get_pressure_item($client_raw_fields, $pressure_field)
    {
        return array(
            "hpa" => get_pressure_hpa(read_client_raw_field($client_raw_fields, $pressure_field)),
            "inhg" => get_pressure_inhg(read_client_raw_field($client_raw_fields, $pressure_field)),
            "kpa" => get_pressure_kpa(read_client_raw_field($client_raw_fields, $pressure_field)),
            "mb" => get_pressure_mb(read_client_raw_field($client_raw_fields, $pressure_field)),
            "mmhg" => get_pressure_mmhg(read_client_raw_field($client_raw_fields, $pressure_field)));
    }

?>
