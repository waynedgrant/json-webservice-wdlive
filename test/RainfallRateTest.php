<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class RainfallRateTest extends PHPUnit_Framework_TestCase
{
    public function test_rainfall_rate_values_are_null_when_millimetres_per_minute_is_empty()
    {
        $testee = new RainfallRate("-");
        $this->assertNull($testee->getInchesPerMinute());
        $this->assertNull($testee->getMillimetresPerMinute());
    }

    public function test_all_measures_values_are_null_when_millimetres_per_minute_is_empty()
    {
        $testee = new RainfallRate("-");
        $this->assertNull($testee->getAllMeasures()["in"]);
        $this->assertNull($testee->getAllMeasures()["mm"]);
    }

    public function test_rainfall_rate_values_are_correct_when_millimetres_per_minute_is_not_empty()
    {
        $testee = new RainfallRate("0.00");
        $this->assertSame("0.000", $testee->getInchesPerMinute());
        $this->assertSame("0.00", $testee->getMillimetresPerMinute());

        $testee = new RainfallRate("10.01");
        $this->assertSame("0.394", $testee->getInchesPerMinute());
        $this->assertSame("10.01", $testee->getMillimetresPerMinute());

        $testee = new RainfallRate("50.55");
        $this->assertSame("1.990", $testee->getInchesPerMinute());
        $this->assertSame("50.55", $testee->getMillimetresPerMinute());
    }

    public function test_all_measures_values_are_correct_when_millimetres_per_minute_is_not_empty()
    {
        $testee = new RainfallRate("0.00");
        $this->assertSame("0.000", $testee->getAllMeasures()["in"]);
        $this->assertSame("0.00", $testee->getAllMeasures()["mm"]);

        $testee = new RainfallRate("10.01");
        $this->assertSame("0.394", $testee->getAllMeasures()["in"]);
        $this->assertSame("10.01", $testee->getAllMeasures()["mm"]);

        $testee = new RainfallRate("50.55");
        $this->assertSame("1.990", $testee->getAllMeasures()["in"]);
        $this->assertSame("50.55", $testee->getAllMeasures()["mm"]);
    }
}

?>
