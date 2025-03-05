<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Cnx\Methods\Eth;

use Cnx\Formatters\FeeHistoryFormatter;
use Cnx\Formatters\OptionalQuantityFormatter;
use Cnx\Formatters\QuantityFormatter;
use Cnx\Methods\EthMethod;
use Cnx\Validators\ArrayNumberValidator;
use Cnx\Validators\QuantityValidator;
use Cnx\Validators\TagValidator;

class FeeHistory extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        QuantityValidator::class, [
            TagValidator::class, QuantityValidator::class
        ], ArrayNumberValidator::class
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        QuantityFormatter::class, OptionalQuantityFormatter::class
    ];

    /**
     * outputFormatters
     * 
     * @var array
     */
    protected $outputFormatters = [
        FeeHistoryFormatter::class
    ];

    /**
     * defaultValues
     * 
     * @var array
     */
    protected $defaultValues = [];
}
