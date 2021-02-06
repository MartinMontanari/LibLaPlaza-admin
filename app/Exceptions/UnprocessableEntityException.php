<?php


namespace App\Exceptions;


use App\Http\Enums\HttpCodes;

class UnprocessableEntityException extends \Exception implements \Throwable
{

    private array $messages;

    /**
     * ResultNotFoundException constructor.
     * @param array $message
     * @param int $code
     */
    public function __construct($message = [], $code = HttpCodes::UNPROCESSABLE_ENTITY)
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
