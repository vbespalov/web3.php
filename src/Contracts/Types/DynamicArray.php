<?php

/**
 * This file is part of web3.php package.
 *
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 *
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Cnx\Contracts\Types;

use Cnx\Formatters\IntegerFormatter;
use Cnx\Utils;
use InvalidArgumentException;

class DynamicArray extends BaseArray
{
    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * isType
     *
     * @param string $name
     * @return bool
     */
    public function isType($name)
    {
        return (preg_match('/(\[\])/', $name) === 1);
    }

    /**
     * isDynamicType
     *
     * @return bool
     */
    public function isDynamicType()
    {
        return true;
    }

    /**
     * inputFormat
     *
     * @param mixed $value
     * @param array $abiType
     * @return string
     */
    public function inputFormat($value, $abiType)
    {
        $results = $this->encodeElements($value, $abiType);
        $encodeSize = IntegerFormatter::format(count($value));
        return $encodeSize . implode('', $results);
    }

    /**
     * outputFormat
     *
     * @param string $value
     * @param array $abiType
     * @return array
     */
    public function outputFormat($value, $abiType)
    {
        if (!is_array($abiType)) {
            throw new InvalidArgumentException('Invalid abiType to decode sized array, expected: array');
        }
        $lengthHex = mb_substr($value, 0, 64);
        $length = (int) Utils::hexToNumber($lengthHex);
        $offset = 0;
        $value = mb_substr($value, 64);
        $results = [];
        $decoder = $abiType['coders'];
        for ($i = 0; $i < $length; $i++) {
            $decodeValueOffset = $offset;
            if ($decoder['dynamic']) {
                $decodeValueOffsetHex = mb_substr($value, $offset, 64);
                $decodeValueOffset = (int) Utils::hexToNumber($decodeValueOffsetHex) * 2;
                $offset += 64;
            } else {
                // For static types (like tuple with static components)
                $decoded = $decoder['solidityType']->decode($value, $decodeValueOffset, $decoder);
                $elementSize = $this->deepCalculateDataLength($decoded) * 64;
                $results[] = $decoded;
                $offset += $elementSize;
                continue;
            }
            $results[] = $decoder['solidityType']->decode($value, $decodeValueOffset, $decoder);
        }
        return $results;
    }
}
