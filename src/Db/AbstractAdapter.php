<?php

namespace App\Db;

use App\Db\Exceptions\NonUniqueResultException;

/**
 * Абстрактный класс для работы с БД.
 * @package App\Db
 */
abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @inheritDoc
     * @throws NonUniqueResultException
     */
    public function fetchOne(string $query): array
    {
        $result = $this->fetchAll($query);

        if (count($result) == 0) {
            return [];
        }

        if (count($result) > 1) {
            throw new NonUniqueResultException();
        }

        return $result[0];
    }

    /**
     * @inheritDoc
     * @throws NonUniqueResultException
     */
    public function fetchOneColumn(string $query): ?string
    {
        $result = $this->fetchOne($query);

        if (count($result) == 0) {
            return null;
        }

        if (count($result) > 1) {
            throw new NonUniqueResultException();
        }

        return array_shift($result);
    }
}
