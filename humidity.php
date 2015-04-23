<?php

    # Copyright 2015 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    function get_humidity($humidity)
    {
        if ($humidity == '-')
        {
            $humidity = null;
        }
        else
        {
            $humidity = number_format($humidity, 0, '.', '');
        }

        return $humidity;
    }

?>
