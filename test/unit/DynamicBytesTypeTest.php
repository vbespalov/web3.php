<?php

namespace Test\Unit;

use Cnx\Contracts\Types\DynamicBytes;
use Test\TestCase;

class DynamicBytesTypeTest extends TestCase
{
    /**
     * testTypes
     * 
     * @var array
     */
    protected $testTypes = [
        [
            'value' => 'bytes',
            'result' => true
        ], [
            'value' => 'bytes[]',
            'result' => true
        ], [
            'value' => 'bytes[4]',
            'result' => true
        ], [
            'value' => 'bytes[][]',
            'result' => true
        ], [
            'value' => 'bytes[3][]',
            'result' => true
        ], [
            'value' => 'bytes[][6][]',
            'result' => true
        ], [
            'value' => 'bytes32',
            'result' => false
        ], [
            'value' => 'bytes8[4]',
            'result' => false
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
        $this->solidityType = new DynamicBytes;
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
