<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class HumidityTest extends PHPUnit_Framework_TestCase
{
    public function test_humidity_value_is_null_when_percentage_is_empty()
    {
        $testee = new Humidity("-");
        $this->assertNull($testee->getPercentage());
    }

    public function test_humidity_value_is_correct_when_percentage_is_not_empty()
    {
        $testee = new Humidity("0");
        $this->assertSame("0", $testee->getPercentage());

        $testee = new Humidity("50");
        $this->assertSame("50", $testee->getPercentage());

        $testee = new Humidity("100");
        $this->assertSame("100", $testee->getPercentage());
    }
}

?>
