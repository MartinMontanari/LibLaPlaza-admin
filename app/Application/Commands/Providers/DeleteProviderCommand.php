<?php


namespace App\Application\Commands\Providers;


class DeleteProviderCommand
{
    private int $id;

    /**
     * DeleteProviderCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
