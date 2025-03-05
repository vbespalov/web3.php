<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Cnx\Methods\Shh;

use Cnx\Methods\EthMethod;
use Cnx\Validators\ShhFilterValidator;

class NewFilter extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        ShhFilterValidator::class
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [];

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
