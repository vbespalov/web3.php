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

use Cnx\Formatters\QuantityFormatter;
use Cnx\Methods\EthMethod;
use Cnx\Validators\BlockHashValidator;
use Cnx\Validators\NonceValidator;

class SubmitWork extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        NonceValidator::class, BlockHashValidator::class, BlockHashValidator::class
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        QuantityFormatter::class
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
    protected $defaultValues = [];
}
