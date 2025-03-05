<?php

namespace Test\Unit;

use Cnx\Formatters\StringFormatter;
use Test\TestCase;

class StringFormatterTest extends TestCase
{
    /**
     * formatter
     * 
     * @var \Cnx\Formatters\StringFormatter
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
        $this->formatter = new StringFormatter;
    }

    /**
     * testFormat
     * 
     * @return void
     */
    public function testFormat()
    {
        $formatter = $this->formatter;

        $str = $formatter->format(123456);
        $this->assertEquals($str, '123456');
    }
}
