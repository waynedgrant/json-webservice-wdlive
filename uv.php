<?php

    # Copyright 2015 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_uvi($uvi)
    {
        if ($uvi == '-')
        {
            $uvi = null;
        }
        else
        {
            $uvi = number_format($uvi, 1, '.', '');
        }

        return $uvi;
    }

    function get_uvi_description($uvi)
    {
        $description = null;

        if ($uvi != '-')
        {
            if ($uvi < 3)
            {
                $description = 'low';
            }
            elseif ($uvi < 6)
            {
                $description = 'moderate';
            }
            elseif ($uvi < 8)
            {
                $description = 'high';
            }
            elseif ($uvi < 11)
            {
                $description = 'very high';
            }
            else
            {
                $description = 'extreme';
            }
        }

        return $description;
    }

    function get_uv_item($client_raw_fields, $uvi_field)
    {
        return array(
            "uvi" => get_uvi(read_client_raw_field($client_raw_fields, $uvi_field)),
            "description" => get_uvi_description(read_client_raw_field($client_raw_fields, $uvi_field)));
    }

?>
