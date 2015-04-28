<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindSpeedTest extends PHPUnit_Framework_TestCase
{
    public function test_wind_speed_values_are_null_when_knots_is_empty()
    {
        $testee = new WindSpeed("-");
        $this->assertNull($testee->getBeaufortScale());
        $this->assertNull($testee->getKilometresPerHour());
        $this->assertNull($testee->getKnots());
        $this->assertNull($testee->getMetresPerSecond());
        $this->assertNull($testee->getMilesPerHour());
    }

    public function test_wind_speed_values_are_correct_when_knots_is_not_empty()
    {
        $testee = new WindSpeed("0.0");
        $this->assertEquals("0.0", $testee->getKilometresPerHour());
        $this->assertEquals("0.0", $testee->getKnots());
        $this->assertEquals("0.0", $testee->getMetresPerSecond());
        $this->assertEquals("0.0", $testee->getMilesPerHour());

        $testee = new WindSpeed("5.1");
        $this->assertEquals("9.4", $testee->getKilometresPerHour());
        $this->assertEquals("5.1", $testee->getKnots());
        $this->assertEquals("2.6", $testee->getMetresPerSecond());
        $this->assertEquals("5.9", $testee->getMilesPerHour());
    }

    public function test_beaufort_scale_values_are_correct_when_knots_is_not_empty()
    {
        self::assert_beaufort_scale_range_correct("0.0", "0.4", 0);
        self::assert_beaufort_scale_range_correct("0.5", "3.4", 1);
        self::assert_beaufort_scale_range_correct("3.5", "6.4", 2);
        self::assert_beaufort_scale_range_correct("6.5", "10.4", 3);
        self::assert_beaufort_scale_range_correct("10.5", "16.4", 4);
        self::assert_beaufort_scale_range_correct("16.5", "21.4", 5);
        self::assert_beaufort_scale_range_correct("21.5", "27.4", 6);
        self::assert_beaufort_scale_range_correct("27.5", "33.4", 7);
        self::assert_beaufort_scale_range_correct("33.5", "40.4", 8);
        self::assert_beaufort_scale_range_correct("40.5", "47.4", 9);
        self::assert_beaufort_scale_range_correct("47.5", "55.4", 10);
        self::assert_beaufort_scale_range_correct("55.5", "63.4", 11);
        self::assert_beaufort_scale_range_correct("63.5", "100.0", 12);
    }

    private function assert_beaufort_scale_range_correct($low_knots, $high_knots, $expected_beaufort_scale)
    {
        $testee = new WindSpeed($low_knots);
        $this->assertEquals($expected_beaufort_scale, $testee->getBeaufortScale());

        $testee = new WindSpeed($high_knots);
        $this->assertEquals($expected_beaufort_scale, $testee->getBeaufortScale());
    }
}

?>