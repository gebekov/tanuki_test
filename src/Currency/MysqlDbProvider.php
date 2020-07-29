<?php

namespace App\Currency;

use App\Db\AdapterInterface;

/**
 * Провайдер данных Mysql.
 */
class MysqlDbProvider extends DbProvider
{
    /**
     * @var string таблица.
     */
    protected $table;

    /**
     * MysqlDbProvider constructor.
     * @param AdapterInterface $adapter
     * @param string $table
     */
    public function __construct(AdapterInterface $adapter, string $table)
    {
        parent::__construct($adapter);

        $this->table = $table;
    }

    /**
     * @inheritDoc
     */
    protected function queryGetCurrencyValue(string $currency): string
    {
        return "SELECT * FROM {$this->table} WHERE currency = '{$currency}' LIMIT 1";
    }

    /**
     * @inheritDoc
     */
    protected function querySetCurrencyValue(string $currency, float $value): string
    {
        return "UPDATE {$this->table} SET value = {$value} WHERE currency = '{$currency}' LIMIT 1";
    }
}
