<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Cnx\Formatters;

use Cnx\Utils;
use Cnx\Validators\TagValidator;

class OptionalQuantityFormatter implements IFormatter
{
    /**
     * format
     * 
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        if (TagValidator::validate($value)) {
            return $value;
        }
        return QuantityFormatter::format($value);
    }
}
