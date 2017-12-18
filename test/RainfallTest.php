<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class RainfallTest extends PHPUnit\Framework\TestCase
{
    public function test_rainfall_values_are_null_when_millimetres_is_empty()
    {
        $testee = new Rainfall("-");
        $this->assertNull($testee->getInches());
        $this->assertNull($testee->getMillimetres());
    }

    public function test_all_measures_values_are_null_when_millimetres_is_empty()
    {
        $testee = new Rainfall("-");
        $this->assertNull($testee->getAllMeasures()["in"]);
        $this->assertNull($testee->getAllMeasures()["mm"]);
    }

    public function test_rainfall_values_are_correct_when_millimetres_is_not_empty()
    {
        $testee = new Rainfall("0.00");
        $this->assertSame("0.00", $testee->getInches());
        $this->assertSame("0.00", $testee->getMillimetres());

        $testee = new Rainfall("10.01");
        $this->assertSame("0.39", $testee->getInches());
        $this->assertSame("10.01", $testee->getMillimetres());

        $testee = new Rainfall("50.55");
        $this->assertSame("1.99", $testee->getInches());
        $this->assertSame("50.55", $testee->getMillimetres());
    }

    public function test_all_measures_values_are_correct_when_millimetres_is_not_empty()
    {
        $testee = new Rainfall("0.00");
        $this->assertSame("0.00", $testee->getAllMeasures()["in"]);
        $this->assertSame("0.00", $testee->getAllMeasures()["mm"]);

        $testee = new Rainfall("10.01");
        $this->assertSame("0.39", $testee->getAllMeasures()["in"]);
        $this->assertSame("10.01", $testee->getAllMeasures()["mm"]);

        $testee = new Rainfall("50.55");
        $this->assertSame("1.99", $testee->getAllMeasures()["in"]);
        $this->assertSame("50.55", $testee->getAllMeasures()["mm"]);
    }
}

?>
