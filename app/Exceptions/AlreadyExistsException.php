<?php


namespace App\Exceptions;
use App\Http\Enums\HttpCodes;
use Throwable;

class AlreadyExistsException extends \Exception implements Throwable
{
    private array $messages;

    public function __construct($message = [], $code = HttpCodes::CONFLICT)
    {
        $this->messages = $message;
        parent::__construct($message, $code);
    }

    /**
     * @return array|mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
