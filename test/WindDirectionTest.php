<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindDirectionTest extends PHPUnit_Framework_TestCase
{
    public function test_wind_direction_values_are_null_when_compass_degrees_is_empty()
    {
        $testee = new WindDirection("-");
        $this->assertNull($testee->getCardinalDirection());
        $this->assertNull($testee->getCompassDegrees());
    }

    public function test_all_measures_values_are_null_when_compass_degrees_is_empty()
    {
        $testee = new WindDirection("-");
        $this->assertNull($testee->getAllMeasures()["cardinal"]);
        $this->assertNull($testee->getAllMeasures()["dergrees"]);
    }

    public function test_wind_direction_values_are_correct_when_compass_degrees_is_not_empty()
    {
        $testee = new WindDirection("0");
        $this->assertSame("0", $testee->getCompassDegrees());

        $testee = new WindDirection("180");
        $this->assertSame("180", $testee->getCompassDegrees());
    }

    public function test_cardinal_direction_values_are_correct_when_compass_degrees_is_not_empty()
    {
        self::assert_cardinal_direction_correct("0", "N");
        self::assert_cardinal_direction_correct("22", "NNE");
        self::assert_cardinal_direction_correct("45", "NE");
        self::assert_cardinal_direction_correct("68", "ENE");
        self::assert_cardinal_direction_correct("90", "E");
        self::assert_cardinal_direction_correct("112", "ESE");
        self::assert_cardinal_direction_correct("135", "SE");
        self::assert_cardinal_direction_correct("158", "SSE");
        self::assert_cardinal_direction_correct("180", "S");
        self::assert_cardinal_direction_correct("202", "SSW");
        self::assert_cardinal_direction_correct("225", "SW");
        self::assert_cardinal_direction_correct("248", "WSW");
        self::assert_cardinal_direction_correct("270", "W");
        self::assert_cardinal_direction_correct("292", "WNW");
        self::assert_cardinal_direction_correct("315", "NW");
        self::assert_cardinal_direction_correct("335", "NNW");
    }

    private function assert_cardinal_direction_correct($compassDegrees, $expectedCardinalDirection)
    {
        $testee = new WindDirection($compassDegrees);
        $this->assertSame($expectedCardinalDirection, $testee->getCardinalDirection());
    }

    public function test_all_measures_values_are_correct_when_compass_degrees_is_not_empty()
    {
        $testee = new WindDirection("0");
        $this->assertSame("N", $testee->getAllMeasures()["cardinal"]);
        $this->assertSame("0", $testee->getAllMeasures()["degrees"]);


        $testee = new WindDirection("180");
        $this->assertSame("S", $testee->getAllMeasures()["cardinal"]);
        $this->assertSame("180", $testee->getAllMeasures()["degrees"]);
    }
}

?>
