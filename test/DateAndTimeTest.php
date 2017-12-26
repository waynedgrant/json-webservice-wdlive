<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class DateAndTimeTest extends PHPUnit\Framework\TestCase {

    public function test_date_and_time_values_are_null_when_date_and_time_is_empty() {
        $testee = new DateAndTime("-", "-", "-", "-", "-");
        $this->assertNull($testee->getYear());
        $this->assertNull($testee->getMonth());
        $this->assertNull($testee->getDay());
        $this->assertNull($testee->getHour());
        $this->assertNull($testee->getMinute());
        $this->assertNull($testee->getDate());
        $this->assertNull($testee->getTime());
        $this->assertNull($testee->getTimeAndDate());
    }

    public function test_all_values_are_null_when_date_and_time_is_empty() {
        $testee = new DateAndTime("-", "-", "-", "-", "-");
        $this->assertNull($testee->getAllValues()["year"]);
        $this->assertNull($testee->getAllValues()["month"]);
        $this->assertNull($testee->getAllValues()["day"]);
        $this->assertNull($testee->getAllValues()["hour"]);
        $this->assertNull($testee->getAllValues()["minute"]);
        $this->assertNull($testee->getAllValues()["date"]);
        $this->assertNull($testee->getAllValues()["time"]);
        $this->assertNull($testee->getAllValues()["time_date"]);
    }

    public function test_date_and_time_values_are_correct_when_date_and_time_is_not_empty() {
        $testee = new DateAndTime("2015", "12", "31", "23", "59");
        $this->assertSame("2015", $testee->getYear());
        $this->assertSame("12", $testee->getMonth());
        $this->assertSame("31", $testee->getDay());
        $this->assertSame("23", $testee->getHour());
        $this->assertSame("59", $testee->getMinute());
        $this->assertSame("31/12/2015", $testee->getDate());
        $this->assertSame("23:59", $testee->getTime());
        $this->assertSame("23:59 31/12/2015", $testee->getTimeAndDate());
    }

    public function test_all_values_are_correct_when_date_and_time_is_not_empty() {
        $testee = new DateAndTime("2015", "12", "31", "23", "59");
        $this->assertSame("2015", $testee->getAllValues()["year"]);
        $this->assertSame("12", $testee->getAllValues()["month"]);
        $this->assertSame("31", $testee->getAllValues()["day"]);
        $this->assertSame("23", $testee->getAllValues()["hour"]);
        $this->assertSame("59", $testee->getAllValues()["minute"]);
        $this->assertSame("31/12/2015", $testee->getAllValues()["date"]);
        $this->assertSame("23:59", $testee->getAllValues()["time"]);
        $this->assertSame("23:59 31/12/2015", $testee->getAllValues()["time_date"]);
    }
}

?>
