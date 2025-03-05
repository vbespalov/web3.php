<?php

namespace Test\Unit;

use Cnx\Formatters\NumberFormatter;
use Test\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * formatter
     * 
     * @var \Cnx\Formatters\NumberFormatter
     */
    protected $formatter;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->formatter = new NumberFormatter;
    }

    /**
     * testFormat
     * 
     * @return void
     */
    public function testFormat()
    {
        $formatter = $this->formatter;

        $number= $formatter->format('123');
        $this->assertEquals($number, 123);
    }
}
