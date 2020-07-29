<?php

namespace App\Currency\Exceptions;

use Exception;

/**
 * Исключение, которое вызывается в случае, если не найден курс валют (по разным причинам).
 * @package App\ExchangeRates\Exceptions
 */
class CurrencyNotFoundException extends Exception
{
    public function __construct(string $currency, $code = 0, \Throwable $previous = null)
    {
        $message = "Currency not found: {$currency}";

        parent::__construct($message, $code, $previous);
    }
}
