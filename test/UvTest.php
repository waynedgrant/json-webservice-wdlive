<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class UvTest extends PHPUnit_Framework_TestCase
{
    public function test_uv_values_are_null_when_uvi_is_empty()
    {
        $testee = new Uv("-");
        $this->assertNull($testee->getUvi());
        $this->assertNull($testee->getUviDescription());
    }

    public function test_all_measures_values_are_null_when_uvi_is_empty()
    {
        $testee = new Uv("-");
        $this->assertNull($testee->getAllMeasures()["uvi"]);
        $this->assertNull($testee->getAllMeasures()["description"]);
    }

    public function test_uv_values_are_correct_when_uvi_is_not_empty()
    {
        $testee = new Uv("0.0");
        $this->assertSame("0.0", $testee->getUvi());
        $this->assertSame("low", $testee->getUviDescription());

        $testee = new Uv("2.9");
        $this->assertSame("2.9", $testee->getUvi());
        $this->assertSame("low", $testee->getUviDescription());

        $testee = new Uv("3.0");
        $this->assertSame("3.0", $testee->getUvi());
        $this->assertSame("moderate", $testee->getUviDescription());

        $testee = new Uv("5.9");
        $this->assertSame("5.9", $testee->getUvi());
        $this->assertSame("moderate", $testee->getUviDescription());

        $testee = new Uv("6.0");
        $this->assertSame("6.0", $testee->getUvi());
        $this->assertSame("high", $testee->getUviDescription());

        $testee = new Uv("7.9");
        $this->assertSame("7.9", $testee->getUvi());
        $this->assertSame("high", $testee->getUviDescription());

        $testee = new Uv("8.0");
        $this->assertSame("8.0", $testee->getUvi());
        $this->assertSame("very high", $testee->getUviDescription());

        $testee = new Uv("10.9");
        $this->assertSame("10.9", $testee->getUvi());
        $this->assertSame("very high", $testee->getUviDescription());

        $testee = new Uv("11.0");
        $this->assertSame("11.0", $testee->getUvi());
        $this->assertSame("extreme", $testee->getUviDescription());
    }

    public function test_all_measurements_values_are_correct_when_uvi_is_not_empty()
    {
        $testee = new Uv("0.0");
        $this->assertSame("0.0", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("low", $testee->getAllMeasures()["description"]);

        $testee = new Uv("2.9");
        $this->assertSame("2.9", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("low", $testee->getAllMeasures()["description"]);

        $testee = new Uv("3.0");
        $this->assertSame("3.0", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("moderate", $testee->getAllMeasures()["description"]);

        $testee = new Uv("5.9");
        $this->assertSame("5.9", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("moderate", $testee->getAllMeasures()["description"]);

        $testee = new Uv("6.0");
        $this->assertSame("6.0", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("high", $testee->getAllMeasures()["description"]);

        $testee = new Uv("7.9");
        $this->assertSame("7.9", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("high", $testee->getAllMeasures()["description"]);

        $testee = new Uv("8.0");
        $this->assertSame("8.0", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("very high", $testee->getAllMeasures()["description"]);

        $testee = new Uv("10.9");
        $this->assertSame("10.9", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("very high", $testee->getAllMeasures()["description"]);

        $testee = new Uv("11.0");
        $this->assertSame("11.0", $testee->getAllMeasures()["uvi"]);
        $this->assertSame("extreme", $testee->getAllMeasures()["description"]);
    }
}

?>
