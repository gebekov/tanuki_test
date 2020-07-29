<?php

namespace App\Currency;

use App\Db\AdapterInterface as DbAdapterInterface;
use App\Currency\Exceptions\CurrencyNotFoundException;

/**
 * Провайдер курса валют, который достает данные из БД.
 * @package App\ExchangeRates
 */
abstract class DbProvider implements LocalProviderInterface
{
    /**
     * @var DbAdapterInterface адаптер для работы с БД.
     */
    protected $dbAdapter;

    /**
     * DbProvider constructor.
     * @param DbAdapterInterface $adapter
     */
    public function __construct(DbAdapterInterface $adapter)
    {
        $this->dbAdapter = $adapter;
    }

    /**
     * @inheritDoc
     * @throws CurrencyNotFoundException
     */
    public function get(string $currency): float
    {
        $query = $this->queryGetCurrencyValue($currency);

        $result = $this->dbAdapter->fetchOneColumn($query);

        if ($result === null) {
            throw new CurrencyNotFoundException($currency);
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function set(string $currency, float $value): void
    {
        $query = $this->querySetCurrencyValue($currency, $value);

        $this->dbAdapter->query($query);
    }

    /**
     * Возвращает запрос на получение значения валюты.
     * @param string $currency
     * @return string
     */
    abstract protected function queryGetCurrencyValue(string $currency): string;

    /**
     * Возвращает запрос на сохранение значения валюты.
     * @param string $currency
     * @param float $value
     * @return string
     */
    abstract protected function querySetCurrencyValue(string $currency, float $value): string;
}
