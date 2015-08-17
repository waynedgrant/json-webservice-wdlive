<?php

    # Copyright 2015 Wayne D Grant (www.waynedgrant.com)
    # Licensed under the MIT License

    $client_raw_directory = './';
    $service_version = 1.2;

    function get_client_raw_fields()
    {
        global $client_raw_directory;
        return get_client_raw_fields_from_path($client_raw_directory . 'clientraw.txt');
    }

    function get_client_raw_extra_fields()
    {
        global $client_raw_directory;
        return get_client_raw_fields_from_path($client_raw_directory . 'clientrawextra.txt');
    }

    function get_client_raw_fields_from_path($client_raw_path)
    {
        $field_delimiter = ' ';
        $client_raw_fields = array();

        if (is_readable($client_raw_path))
        {
            $client_raw_file = fopen($client_raw_path, 'r');

            if ($client_raw_file)
            {
                $client_raw_text = '';

                while (!feof($client_raw_file))
                {
                    $client_raw_text .= fread($client_raw_file, 8192);
                }

                fclose($client_raw_file);
                $client_raw_fields = explode($field_delimiter, trim($client_raw_text));
            }
        }

        return $client_raw_fields;
    }

    function read_client_raw_field($client_raw_fields, $index)
    {
        if ($index >= count($client_raw_fields))
        {
            return '-';
        }

        return trim($client_raw_fields[$index]);
    }

    function get_value($text)
    {
        if ($text == '-')
        {
            $text = null;
        }
        else
        {
            $text = trim($text);
        }

        return $text;
    }

    function get_service_url()
    {
        return "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    function get_endpoint_item()
    {
        global $service_version;
        return array(
            "url" => get_service_url(),
            "version" => $service_version);
    }

    function get_station_name($station_name)
    {
        if ($station_name == '-')
        {
            $station_name = null;
        }
        else
        {
            // Unescape '_' that represent spaces
            $station_name = str_replace('_', ' ', $station_name);

            // Remove trailing time if included in station name
            $dash_position = strrpos($station_name, "-");
            if ($dash_position !== false)
            {
                $station_name = substr($station_name, 0, $dash_position-1);
            }
        }

        return $station_name;
    }

    function get_wd_version($wd_version)
    {
        if ($wd_version == '-')
        {
            $wd_version = null;
        }
        else
        {
            // Remove leading and trailing '!!' from version
            $wd_version = str_replace('!!', '', $wd_version);
        }

        return $wd_version;
    }

    function get_station_item($client_raw_fields)
    {
        return array(
            "name" => get_station_name(read_client_raw_field($client_raw_fields, 32)),
            "latitude" => get_value(read_client_raw_field($client_raw_fields, 160)),
            "longitude" => get_value(read_client_raw_field($client_raw_fields, 161)),
            "wd_version" => get_wd_version(read_client_raw_field($client_raw_fields, count($client_raw_fields)-1)));
    }

    function get_time_item($client_raw_fields, $hour_field, $minute_field, $day_field, $month_field, $year_field)
    {
        $hour = get_value(read_client_raw_field($client_raw_fields, $hour_field));
        $minute = get_value(read_client_raw_field($client_raw_fields, $minute_field));

        $time = null;

        if (!is_null($hour) && !is_null($minute))
        {
            $time = $hour . ":" . $minute;
        }

        $day = get_value(read_client_raw_field($client_raw_fields, $day_field));
        $month = get_value(read_client_raw_field($client_raw_fields, $month_field));
        $year = get_value(read_client_raw_field($client_raw_fields, $year_field));

        $date = null;

        if (!is_null($day) && !is_null($month) && !is_null($year))
        {
            $date = $day . "/" . $month . "/" . $year;
        }

        $time_date = null;

        if (!is_null($time) && !is_null($date))
        {
            $time_date = $time . " " . $date;
        }

        return array(
            "hour" => $hour,
            "minute" => $minute,
            "day" => $day,
            "month" => $month,
            "year" => $year,
            "time" => $time,
            "date" => $date,
            "time_date" => $time_date);
    }

    function get_trend($trend)
    {
        $trend_number = null;

        if ($trend != '-')
        {
            if ($trend == 0)
            {
                $trend_number = '0';
            }
            elseif ($trend > 0)
            {
                $trend_number = '1';
            }
            else
            {
                $trend_number = '-1';
            }
        }

        return $trend_number;
    }

?>
