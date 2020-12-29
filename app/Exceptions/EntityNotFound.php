<?php


namespace App\Exceptions;


use App\Http\Enums\HttpCodes;

class EntityNotFound extends \Exception implements \Throwable
{

    private array $messages;

    /**
     * EntityNotFound constructor.
     * @param array $message
     * @param int $code
     */
    public function __construct($message = [], $code = HttpCodes::NOT_FOUND)
    {
        $this->messages = $message;
        parent::__construct('', $code);
    }

    /**
     * @return array|mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
