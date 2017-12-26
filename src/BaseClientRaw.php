<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

abstract class BaseClientRaw {

    private $fields;

    public function __construct($location) {
        $this->fields = self::getFieldsFromLocation($location);
    }

    private function getFieldsFromLocation($location) {
        $fieldDelimiter = ' ';
        $fields = array();

        if (is_readable($location) || filter_var($location, FILTER_VALIDATE_URL)) {
            $clientRawFile = fopen($location, 'r');

            if ($clientRawFile) {
                $clientRawText = '';

                while (!feof($clientRawFile)) {
                    $clientRawText .= fread($clientRawFile, 8192);
                }

                fclose($clientRawFile);

                if (strlen($clientRawText) != 0) {
                    $fields = explode($fieldDelimiter, trim($clientRawText));
                }
            }
        }

        return $fields;
    }

    protected function readField($index) {
        if ($index < 0 or $index >= count($this->fields)) {
            return '-';
        }

        return trim($this->fields[$index]);
    }

    protected function fieldCount() {
        return count($this->fields);
    }

    protected function getDateAndTime($yearIndex, $monthIndex, $dayIndex, $hourIndex, $minuteIndex) {
        $year = self::readField($yearIndex);
        $month = self::readField($monthIndex);
        $day = self::readField($dayIndex);
        $hour = self::readField($hourIndex);
        $minute = self::readField($minuteIndex);

        return new DateAndTime($year, $month, $day, $hour, $minute, $second);
    }
}

?>
