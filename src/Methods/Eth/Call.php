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

use Cnx\Formatters\OptionalQuantityFormatter;
use Cnx\Formatters\TransactionFormatter;
use Cnx\Methods\EthMethod;
use Cnx\Validators\CallValidator;
use Cnx\Validators\QuantityValidator;
use Cnx\Validators\TagValidator;

class Call extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        CallValidator::class, [
            TagValidator::class, QuantityValidator::class
        ]
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        TransactionFormatter::class, OptionalQuantityFormatter::class
    ];

    /**
     * outputFormatters
     * 
     * @var array
     */
    protected $outputFormatters = [];

    /**
     * defaultValues
     * 
     * @var array
     */
    protected $defaultValues = [
        1 => 'latest'
    ];
}
