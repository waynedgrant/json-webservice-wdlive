<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class RainfallTest extends PHPUnit_Framework_TestCase
{
    public function test_rainfall_values_are_null_when_millimetres_is_empty()
    {
        $testee = new Rainfall("-");
        $this->assertNull($testee->getInches());
        $this->assertNull($testee->getMillimetres());
    }

    public function test_rainfall_values_are_correct_when_millimetres_is_not_empty()
    {
        $testee = new Rainfall("0.00");
        $this->assertEquals("0.00", $testee->getInches());
        $this->assertEquals("0.00", $testee->getMillimetres());

        $testee = new Rainfall("10.01");
        $this->assertEquals("0.39", $testee->getInches());
        $this->assertEquals("10.01", $testee->getMillimetres());

        $testee = new Rainfall("50.55");
        $this->assertEquals("1.99", $testee->getInches());
        $this->assertEquals("50.55", $testee->getMillimetres());
    }
}

?>
