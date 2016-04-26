<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class TrendTest extends PHPUnit_Framework_TestCase
{
    public function test_trend_value_is_null_when_trend_is_empty()
    {
        $testee = new Trend("-");
        $this->assertNull($testee->getTrend());
    }

    public function test_trend_value_is_correct_when_trend_is_not_empty()
    {
        $testee = new Trend("5");
        $this->assertSame("1", $testee->getTrend());

        $testee = new Trend("0");
        $this->assertSame("0", $testee->getTrend());

        $testee = new Trend("-5");
        $this->assertSame("-1", $testee->getTrend());
    }
}

?>
