<?php

namespace App\Db;

/**
 * Интерфейс адаптера для работы с БД.
 * @package App\Db
 */
interface AdapterInterface
{
    /**
     * Посылает запрос и возвращает ассоциированный массив.
     * @param string $query
     * @return array
     */
    public function fetchAll(string $query): array;

    /**
     * Посылает запрос и возвращает первый результат.
     * @param string $query
     * @return array
     */
    public function fetchOne(string $query): array;

    /**
     * Посылает запрос и возвращает значение первой колонки.
     * @param string $query
     * @return string|null
     */
    public function fetchOneColumn(string $query): ?string;

    /**
     * Посылает обычный запрос.
     * @param string $query
     */
    public function query(string $query): void;
}
