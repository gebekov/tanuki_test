<?php

namespace App\Currency;

/**
 * Интерфейс адаптера, который возвращает курс валют.
 * @package App\ExchangeRates
 */
interface ProviderInterface
{
    /**
     * Возвращает текущее соотношение валюты к рублю.
     * @param string $currency
     * @return float
     */
    public function get(string $currency): float;
}
