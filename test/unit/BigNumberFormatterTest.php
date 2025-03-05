<?php

namespace Test\Unit;

use Cnx\Formatters\BigNumberFormatter;
use phpseclib\Math\BigInteger as BigNumber;
use Test\TestCase;

class BigNumberFormatterTest extends TestCase
{
    /**
     * formatter
     * 
     * @var \Cnx\Formatters\BigNumberFormatter
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
        $this->formatter = new BigNumberFormatter;
    }

    /**
     * testFormat
     * 
     * @return void
     */
    public function testFormat()
    {
        $formatter = $this->formatter;

        $bigNumber = $formatter->format(1);
        $this->assertEquals($bigNumber->toString(), '1');
        $this->assertTrue($bigNumber instanceof BigNumber);
    }
}
