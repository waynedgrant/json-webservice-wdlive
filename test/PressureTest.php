<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
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

    public function test_pressure_values_are_correct_when_hectopascals_is_not_empty()
    {
        $testee = new Pressure("0.0");
        $this->assertEquals("0.0", $testee->getHectopascals());
        $this->assertEquals("0.00", $testee->getInchesOfMercury());
        $this->assertEquals("0.00", $testee->getKilopascals());
        $this->assertEquals("0.0", $testee->getMillibars());
        $this->assertEquals("0.0", $testee->getMillimetresOfMercury());

        $testee = new Pressure("1017.7");
        $this->assertEquals("1017.7", $testee->getHectopascals());
        $this->assertEquals("30.05", $testee->getInchesOfMercury());
        $this->assertEquals("101.77", $testee->getKilopascals());
        $this->assertEquals("1017.7", $testee->getMillibars());
        $this->assertEquals("763.3", $testee->getMillimetresOfMercury());
    }
}

?>
