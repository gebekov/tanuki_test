<?php

namespace App\Db;

/**
 * Ничего не делающий адаптер.
 * @package App\Db
 */
class DummyAdapter extends AbstractAdapter
{
    /**
     * @inheritDoc
     */
    public function fetchAll(string $query): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function query(string $query): void
    {
        // ничего не делаем.
    }
}
