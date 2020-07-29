<?php

namespace App\Db\Exceptions;

use Exception;
use Throwable;

/**
 * Исключение, которое выбрасывается в случае, если запрос, который должен вернуть одну колонку, вернул больше.
 * @package App\Db\Exceptions
 */
class NonUniqueResultException extends Exception
{
    /**
     * NonUniqueResultException constructor.
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($code = 0, Throwable $previous = null)
    {
        $message = "Non-unique query result";

        parent::__construct($message, $code, $previous);
    }
}
