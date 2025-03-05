<?php

namespace Test\Unit;

use Cnx\Providers\HttpProvider;
use Test\TestCase;

class ProviderTest extends TestCase
{
    /**
     * testNewProvider
     * 
     * @return void
     */
    public function testNewProvider()
    {
        $provider = new HttpProvider('http://localhost:8545');

        $this->assertEquals($provider->host, 'http://localhost:8545');
    }
}
