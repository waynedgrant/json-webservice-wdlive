<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class DateAndTime
{
    private $year;
    private $month;
    private $day;
    private $hour;
    private $minute;
    private $date;
    private $time;
    private $timeAndDate;

    public function __construct($year, $month, $day, $hour, $minute)
    {
        if ($year != '-' && $month != '-' && $day != '-' && $hour != '-' && $minute != '-')
        {
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
            $this->hour = $hour;
            $this->minute = $minute;

            $this->date = $day . "/" . $month . "/" . $year;
            $this->time = $hour . ":" . $minute;
            $this->timeAndDate = $this->time . " " . $this->date;
        }
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getMinute()
    {
        return $this->minute;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getTimeAndDate()
    {
        return $this->timeAndDate;
    }

    public function getAllValues()
    {
        return array(
            "hour" => $this->getHour(),
            "minute" => $this->getMinute(),
            "day" => $this->getDay(),
            "month" => $this->getMonth(),
            "year" => $this->getYear(),
            "time" => $this->getTime(),
            "date" => $this->getDate(),
            "time_date" => $this->getTimeAndDate());
    }
}

?>
