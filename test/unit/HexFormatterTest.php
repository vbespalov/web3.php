<?php

namespace Test\Unit;

use Cnx\Formatters\HexFormatter;
use Test\TestCase;

class HexFormatterTest extends TestCase
{
    /**
     * formatter
     * 
     * @var \Cnx\Formatters\HexFormatter
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
        $this->formatter = new HexFormatter;
    }

    /**
     * testFormat
     * 
     * @return void
     */
    public function testFormat()
    {
        $formatter = $this->formatter;

        $hex = $formatter->format('ae');
        $this->assertEquals($hex, '0x6165');

        $hex = $formatter->format('0xabce');
        $this->assertEquals($hex, '0xabce');

        $hex = $formatter->format('123');
        $this->assertEquals($hex, '0x313233');

        $hex = $formatter->format(12);
        $this->assertEquals($hex, '0xc');
    }
}
