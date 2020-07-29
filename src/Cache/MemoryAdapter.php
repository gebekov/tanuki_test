<?php

namespace App\Cache;

/**
 * Адаптер кеша, который записывает данные в память.
 * @package App\Cache
 */
class MemoryAdapter implements AdapterInterface
{
    /**
     * @var array записанные данные.
     */
    protected $data = [];

    /**
     * @inheritDoc
     */
    public function get(string $key, $defaultValue = null)
    {
        return $this->data[$key] ?? $defaultValue;
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, $value): void
    {
        $this->data[$key] = $value;
    }
}
