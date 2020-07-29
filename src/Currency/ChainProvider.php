<?php

namespace App\Currency;

use App\Currency\Exceptions\CurrencyNotFoundException;

/**
 * Смешанный провайдер данных, который работает сразу с кучей других провайдеров (локальных и не локальных).
 * Порядок передаваемых провайдеров важен: сперва необходимо передавать локальные и быстрые провайдеры.
 * @package App\ExchangeRates
 */
class ChainProvider implements ProviderInterface
{
    /**
     * @var ProviderInterface[] провайдеры данных.
     */
    protected $providers = [];

    /**
     * ChainProvider constructor.
     * @param array $providers
     */
    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    /**
     * @inheritDoc
     * @noinspection PhpRedundantCatchClauseInspection
     * @throws CurrencyNotFoundException
     */
    public function get(string $currency): float
    {
        $emptyLocalProviders = [];

        $result = null;

        foreach ($this->providers as $provider) {
            try {
                $result = $provider->get($currency);

                break;
            } catch (CurrencyNotFoundException $exception) {
                if ($provider instanceof LocalProviderInterface) {
                    $emptyLocalProviders[] = $provider;
                }
            }
        }

        if ($result === null) {
            throw new CurrencyNotFoundException($currency);
        }

        foreach ($emptyLocalProviders as $provider) {
            $provider->set($currency, $result);
        }

        return $result;
    }
}
