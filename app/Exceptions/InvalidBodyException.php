<?php


namespace App\Exceptions;
use Throwable;

class InvalidBodyException extends \Exception implements Throwable
{
    private array $messages;

    public function __construct($message = [])
    {
        $this->messages = $message;
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
