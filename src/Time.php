<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Time {

    private $hour;
    private $minute;
    private $time;

    public function __construct($time) {
        if ($time != '-') {
            if (preg_match("/^([1-9]|10|11|12):([0-5][0-9])(AM|PM)$/", $time)) {
                $this->parseTime12Hour($time);
            } elseif (preg_match("/^(2[0-3]|[01][0-9]):([0-5][0-9])$/", $time)) {
                $this->parseTime24Hour($time);
            }
        }
    }

    private function parseTime12Hour($time12Hour) {
        if (strlen($time12Hour) == 6) {
            $time12Hour = '0' . $time12Hour;
        }

        $this->hour = substr($time12Hour, 0, 2);
        $this->minute = substr($time12Hour, 3, 2);
        $meridiem = substr($time12Hour, 5, 2);

        if ($meridiem == 'AM' && $this->hour == '12') {
            $this->hour = '00';
        } elseif ($meridiem == 'PM' && $this->hour != '12') {
            $this->hour = strval($this->hour + 12);
        }

        $this->time = $this->hour . ":" . $this->minute;
    }

    private function parseTime24Hour($time24Hour) {
        $this->hour = substr($time24Hour, 0, 2);
        $this->minute = substr($time24Hour, 3, 2);
        $this->time = $time24Hour;
    }

    public function getHour() {
        return $this->hour;
    }

    public function getMinute() {
        return $this->minute;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getTimeAndDate() {
        return $this->timeAndDate;
    }

    public function getAllValues() {
        return array(
            "hour" => $this->getHour(),
            "minute" => $this->getMinute(),
            "time" => $this->getTime());
    }
}

?>
