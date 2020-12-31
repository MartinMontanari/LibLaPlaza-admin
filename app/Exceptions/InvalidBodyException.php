<?php


namespace App\Exceptions;
use App\Http\Enums\HttpCodes;
use Throwable;

class InvalidBodyException extends \Exception implements Throwable
{
    private array $messages;

    public function __construct($message = [], $code = HttpCodes::UNPROCESSABLE_ENTITY)
    {
        $this->messages = $message;
        $this->code = $code;
        parent::__construct();
    }

    /**
     * @return array|mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
