<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class AltitudeTest extends PHPUnit_Framework_TestCase
{
    public function test_altitude_values_are_null_when_feet_is_empty()
    {
        $testee = new Altitude("-");
        $this->assertNull($testee->getFeet());
        $this->assertNull($testee->getMetres());
        $this->assertNull($testee->getYards());
    }

    public function test_all_measures_values_are_null_when_feet_is_empty()
    {
        $testee = new Altitude("-");
        $this->assertNull($testee->getAllMeasures()["ft"]);
        $this->assertNull($testee->getAllMeasures()["m"]);
        $this->assertNull($testee->getAllMeasures()["yds"]);
    }

    public function test_altitude_values_are_correct_when_feet_is_not_empty()
    {
        $testee = new Altitude("0");
        $this->assertSame("0", $testee->getFeet());
        $this->assertSame("0", $testee->getMetres());
        $this->assertSame("0", $testee->getYards());

        $testee = new Altitude("512");
        $this->assertSame("512", $testee->getFeet());
        $this->assertSame("156", $testee->getMetres());
        $this->assertSame("171", $testee->getYards());

        $testee = new Altitude("5000");
        $this->assertSame("5000", $testee->getFeet());
        $this->assertSame("1524", $testee->getMetres());
        $this->assertSame("1667", $testee->getYards());
    }

    public function test_all_measures_values_are_correct_when_feet_is_not_empty()
    {
        $testee = new Altitude("0");
        $this->assertSame("0", $testee->getAllMeasures()["ft"]);
        $this->assertSame("0", $testee->getAllMeasures()["m"]);
        $this->assertSame("0", $testee->getAllMeasures()["yds"]);

        $testee = new Altitude("512");
        $this->assertSame("512", $testee->getAllMeasures()["ft"]);
        $this->assertSame("156", $testee->getAllMeasures()["m"]);
        $this->assertSame("171", $testee->getAllMeasures()["yds"]);

        $testee = new Altitude("5000");
        $this->assertSame("5000", $testee->getAllMeasures()["ft"]);
        $this->assertSame("1524", $testee->getAllMeasures()["m"]);
        $this->assertSame("1667", $testee->getAllMeasures()["yds"]);
    }
}

?>
