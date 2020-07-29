<?php

use App\Cache\MemoryAdapter;
use App\Currency\MysqlDbProvider;
use App\Db\DummyAdapter;
use App\Currency\CacheProvider;
use App\Currency\ChainProvider;
use App\Currency\HttpProvider;

include __DIR__ . "/../vendor/autoload.php";

$db = new DummyAdapter();

$cache = new MemoryAdapter();

$currencyProvider = new ChainProvider(
    [
        new CacheProvider($cache),
        new MysqlDbProvider($db, "currency"),
        new HttpProvider()
    ]
);

// вернет курс доллара.
$result = $currencyProvider->get("USD");

var_dump($result);

// вернет курс доллара, но на этот раз быстрее (т.к. юзаем кэширование + хранение в БД).
$result = $currencyProvider->get("USD");

var_dump($result);

// Выкинет CurrencyNotFoundException, т.к. ни один провайдер не может найти эту валюту.
$currencyProvider->get("FOO");
