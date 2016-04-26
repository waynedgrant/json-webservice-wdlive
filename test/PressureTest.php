<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class PressureTest extends PHPUnit_Framework_TestCase
{
    public function test_pressure_values_are_null_when_hectopascals_is_empty()
    {
        $testee = new Pressure("-");
        $this->assertNull($testee->getHectopascals());
        $this->assertNull($testee->getInchesOfMercury());
        $this->assertNull($testee->getKilopascals());
        $this->assertNull($testee->getMillibars());
        $this->assertNull($testee->getMillimetresOfMercury());
    }

    public function test_all_measures_values_are_null_when_hectopascals_is_empty()
    {
        $testee = new Pressure("-");
        $this->assertNull($testee->getAllMeasures()["hpa"]);
        $this->assertNull($testee->getAllMeasures()["inhg"]);
        $this->assertNull($testee->getAllMeasures()["kpa"]);
        $this->assertNull($testee->getAllMeasures()["mb"]);
        $this->assertNull($testee->getAllMeasures()["mmhg"]);
    }

    public function test_pressure_values_are_correct_when_hectopascals_is_not_empty()
    {
        $testee = new Pressure("0.0");
        $this->assertSame("0.0", $testee->getHectopascals());
        $this->assertSame("0.00", $testee->getInchesOfMercury());
        $this->assertSame("0.00", $testee->getKilopascals());
        $this->assertSame("0.0", $testee->getMillibars());
        $this->assertSame("0.0", $testee->getMillimetresOfMercury());

        $testee = new Pressure("1017.7");
        $this->assertSame("1017.7", $testee->getHectopascals());
        $this->assertSame("30.05", $testee->getInchesOfMercury());
        $this->assertSame("101.77", $testee->getKilopascals());
        $this->assertSame("1017.7", $testee->getMillibars());
        $this->assertSame("763.3", $testee->getMillimetresOfMercury());
    }

    public function test_all_measures_values_are_correct_when_hectopascals_is_not_empty()
    {
        $testee = new Pressure("0.0");
        $this->assertSame("0.0", $testee->getAllMeasures()["hpa"]);
        $this->assertSame("0.00", $testee->getAllMeasures()["inhg"]);
        $this->assertSame("0.00", $testee->getAllMeasures()["kpa"]);
        $this->assertSame("0.0", $testee->getAllMeasures()["mb"]);
        $this->assertSame("0.0", $testee->getAllMeasures()["mmhg"]);

        $testee = new Pressure("1017.7");
        $this->assertSame("1017.7", $testee->getAllMeasures()["hpa"]);
        $this->assertSame("30.05", $testee->getAllMeasures()["inhg"]);
        $this->assertSame("101.77", $testee->getAllMeasures()["kpa"]);
        $this->assertSame("1017.7", $testee->getAllMeasures()["mb"]);
        $this->assertSame("763.3", $testee->getAllMeasures()["mmhg"]);
    }
}

?>
