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

use Cnx\Contracts\SolidityType;
use Cnx\Formatters\BigNumberFormatter;
use Cnx\Formatters\IntegerFormatter;
use Cnx\Utils;

class Uinteger extends SolidityType implements IType
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
        return (preg_match('/^uint([0-9]{1,})?/', $name) === 1);
    }

    /**
     * isDynamicType
     * 
     * @return bool
     */
    public function isDynamicType()
    {
        return false;
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
        return IntegerFormatter::format($value);
    }

    /**
     * outputFormat
     * 
     * @param mixed $value
     * @param array $abiType
     * @return BigNumber
     */
    public function outputFormat($value, $abiType)
    {
        return BigNumberFormatter::format('0x' . mb_substr($value, 0, 64));
    }
}
