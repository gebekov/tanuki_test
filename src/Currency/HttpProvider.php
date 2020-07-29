<?php

namespace App\Currency;

use App\Currency\Exceptions\CurrencyNotFoundException;
use Exception;

/**
 * Возвращает курс валют, которые находятся во внешнем API.
 * @package App\ExchangeRates
 */
class HttpProvider implements ProviderInterface
{
    /**
     * Урла, из которой вытаскиваем данные.
     */
    const URL = "https://www.cbr-xml-daily.ru/daily_json.js";

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function get(string $currency): float
    {
        $json = file_get_contents(self::URL);

        $array = json_decode($json, true);

        if ($array === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("An error occurred while parsing JSON: " . json_last_error_msg());
        }

        $currencyList = $array["Valute"] ?? null;

        if ($currencyList === null) {
            throw new Exception("Unknown format of JSON");
        }

        if (!isset($currencyList[$currency])) {
            throw new CurrencyNotFoundException($currency);
        }

        return $currencyList[$currency]["Value"];
    }
}
