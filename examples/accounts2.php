<?php

require('./exampleBase.php');

use Cnx\Web3;
use React\Async;
use React\Promise;

$web3 = new Web3('ws://127.0.0.1:8545');

$eth = $web3->eth;

echo 'Eth Get Account and Balance' . PHP_EOL;
$promises = [];
$promises[] = $eth->accounts(function ($err, $accounts) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }
    
    foreach ($accounts as $account) {
        echo 'Account: ' . $account . PHP_EOL;

        $promises[] = $eth->getBalance($account, function ($err, $balance) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            echo 'Balance: ' . $balance . PHP_EOL;
        });
    }

    // wait all promises
    Async\await(Promise\all($promises));
    echo 'close connection...' . PHP_EOL;
    $eth->provider->close();
});
