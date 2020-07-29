<?php

namespace App\Currency;

use App\Cache\AdapterInterface as CacheAdapterInterface;
use App\Currency\Exceptions\CurrencyNotFoundException;

/**
 * Возвращает курс валют, которые находятся в кэше.
 * @package App\ExchangeRates
 */
class CacheProvider implements LocalProviderInterface
{
    /**
     * @var CacheAdapterInterface адаптер кэша.
     */
    protected $cacheAdapter;

    /**
     * CacheProvider constructor.
     * @param CacheAdapterInterface $adapter
     */
    public function __construct(CacheAdapterInterface $adapter)
    {
        $this->cacheAdapter = $adapter;
    }

    /**
     * @inheritDoc
     * @throws CurrencyNotFoundException
     */
    public function get(string $currency): float
    {
        $key = $this->buildKey($currency);

        $value = $this->cacheAdapter->get($key);

        if ($value === null) {
            throw new CurrencyNotFoundException($currency);
        }

        return $value;
    }

    /**
     * Возвращает ключ по коду валюты.
     * @param string $currency
     * @return string
     */
    private function buildKey(string $currency): string
    {
        $currency = strtolower($currency);

        return "currency-list.{$currency}";
    }

    /**
     * @inheritDoc
     */
    public function set(string $currency, float $value): void
    {
        $key = $this->buildKey($currency);

        $this->cacheAdapter->set($key, $value);
    }
}
