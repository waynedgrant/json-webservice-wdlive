<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class TimeTest extends PHPUnit\Framework\TestCase {

    public function test_time_values_are_null_when_time_is_empty() {
        $testee = new Time("-");
        $this->assertNull($testee->getHour());
        $this->assertNull($testee->getMinute());
        $this->assertNull($testee->getTime());
    }

    public function test_all_values_are_null_when_time_is_empty() {
        $testee = new Time("-");
        $this->assertNull($testee->getAllValues()["hour"]);
        $this->assertNull($testee->getAllValues()["minute"]);
        $this->assertNull($testee->getAllValues()["time"]);
    }

    public function test_time_values_are_correct_when_time_is_24_hour() {
        $testee = new Time("23:59");
        $this->assertSame("23", $testee->getHour());
        $this->assertSame("59", $testee->getMinute());
        $this->assertSame("23:59", $testee->getTime());
    }

    public function test_all_values_are_correct_when_date_time_is_24_hour() {
        $testee = new Time("23:59");
        $this->assertSame("23", $testee->getAllValues()["hour"]);
        $this->assertSame("59", $testee->getAllValues()["minute"]);
        $this->assertSame("23:59", $testee->getAllValues()["time"]);
    }

    public function test_time_values_are_correct_when_time_is_12_hour_am() {
        $testee = new Time("5:01AM");
        $this->assertSame("05", $testee->getHour());
        $this->assertSame("01", $testee->getMinute());
        $this->assertSame("05:01", $testee->getTime());

        $testee = new Time("10:32PM");
        $this->assertSame("22", $testee->getHour());
        $this->assertSame("32", $testee->getMinute());
        $this->assertSame("22:32", $testee->getTime());

        $testee = new Time("12:59AM");
        $this->assertSame("00", $testee->getHour());
        $this->assertSame("59", $testee->getMinute());
        $this->assertSame("00:59", $testee->getTime());
    }

    public function test_time_values_are_correct_when_time_is_12_hour_pm() {
        $testee = new Time("5:01PM");
        $this->assertSame("17", $testee->getHour());
        $this->assertSame("01", $testee->getMinute());
        $this->assertSame("17:01", $testee->getTime());

        $testee = new Time("10:32PM");
        $this->assertSame("22", $testee->getHour());
        $this->assertSame("32", $testee->getMinute());
        $this->assertSame("22:32", $testee->getTime());

        $testee = new Time("12:59PM");
        $this->assertSame("12", $testee->getHour());
        $this->assertSame("59", $testee->getMinute());
        $this->assertSame("12:59", $testee->getTime());
    }

    public function test_time_values_are_null_when_time_is_invalid() {
        $testee = new Time("00:11PM");
        $this->assertNull($testee->getHour());
        $this->assertNull($testee->getMinute());
        $this->assertNull($testee->getTime());
    }

    public function test_all_values_are_null_when_time_is_invalid() {
        $testee = new Time("00:11PM");
        $this->assertNull($testee->getAllValues()["hour"]);
        $this->assertNull($testee->getAllValues()["minute"]);
        $this->assertNull($testee->getAllValues()["time"]);
    }
}

?>
