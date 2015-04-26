<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class UvTest extends PHPUnit_Framework_TestCase
{
    public function test_uv_values_are_null_when_uvi_is_empty()
    {
        $testee = new Uv("-");
        $this->assertNull($testee->getUvi());
        $this->assertNull($testee->getUviDescription());
    }

    public function test_uv_values_are_correct_when_uvi_is_not_empty()
    {
        $testee = new Uv("0.0");
        $this->assertEquals("0.0", $testee->getUvi());
        $this->assertEquals("low", $testee->getUviDescription());

        $testee = new Uv("2.9");
        $this->assertEquals("2.9", $testee->getUvi());
        $this->assertEquals("low", $testee->getUviDescription());

        $testee = new Uv("3.0");
        $this->assertEquals("3.0", $testee->getUvi());
        $this->assertEquals("moderate", $testee->getUviDescription());

        $testee = new Uv("5.9");
        $this->assertEquals("5.9", $testee->getUvi());
        $this->assertEquals("moderate", $testee->getUviDescription());

        $testee = new Uv("6.0");
        $this->assertEquals("6.0", $testee->getUvi());
        $this->assertEquals("high", $testee->getUviDescription());

        $testee = new Uv("7.9");
        $this->assertEquals("7.9", $testee->getUvi());
        $this->assertEquals("high", $testee->getUviDescription());

        $testee = new Uv("8.0");
        $this->assertEquals("8.0", $testee->getUvi());
        $this->assertEquals("very high", $testee->getUviDescription());

        $testee = new Uv("10.9");
        $this->assertEquals("10.9", $testee->getUvi());
        $this->assertEquals("very high", $testee->getUviDescription());

        $testee = new Uv("11.0");
        $this->assertEquals("11.0", $testee->getUvi());
        $this->assertEquals("extreme", $testee->getUviDescription());
    }
}

?>
