<?php

namespace Test\Unit;

use Cnx\Contracts\Types\Bytes;
use Test\TestCase;

class BytesTypeTest extends TestCase
{
    /**
     * testTypes
     * 
     * @var array
     */
    protected $testTypes = [
        [
            'value' => 'bytes',
            'result' => false
        ], [
            'value' => 'bytes[]',
            'result' => false
        ], [
            'value' => 'bytes[4]',
            'result' => false
        ], [
            'value' => 'bytes[][]',
            'result' => false
        ], [
            'value' => 'bytes[3][]',
            'result' => false
        ], [
            'value' => 'bytes[][6][]',
            'result' => false
        ], [
            'value' => 'bytes32',
            'result' => true
        ], [
            'value' => 'bytes8[4]',
            'result' => true
        ],
    ];

    /**
     * solidityType
     * 
     * @var \Cnx\Contracts\SolidityType
     */
    protected $solidityType;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->solidityType = new Bytes;
    }

    /**
     * testIsType
     * 
     * @return void
     */
    public function testIsType()
    {
        $solidityType = $this->solidityType;

        foreach ($this->testTypes as $type) {
            $this->assertEquals($solidityType->isType($type['value']), $type['result']);
        }
    }
}
