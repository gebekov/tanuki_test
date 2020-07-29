<?php

namespace App\Currency;

/**
 * Интерфейс локального провайдера валют.
 * Отличие их от обычных в том, что значения валют можно создавать или изменять как угодно.
 * @package App\ExchangeRates
 */
interface LocalProviderInterface extends ProviderInterface
{
    /**
     * Записывает значение.
     * @param string $currency
     * @param float $value
     */
    public function set(string $currency, float $value): void;
}
