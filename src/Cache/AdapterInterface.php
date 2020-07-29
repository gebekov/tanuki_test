<?php

namespace App\Cache;

/**
 * Интерфейс адаптера кэша.
 * @package App\Cache
 */
interface AdapterInterface
{
    /**
     * Возвращает значение из кэша.
     * @param string $key
     * @param null $defaultValue
     * @return mixed
     */
    public function get(string $key, $defaultValue = null);

    /**
     * Записывает значение в кэш.
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value): void;
}
