<?php


namespace App\Application\Commands\Providers;


class StoreProviderCommand
{
    private string $code;
    private string $name;
    private ?string $description;

    /**
     * StoreProviderCommand constructor.
     * @param string $code
     * @param string $name
     * @param string|null $description
     */
    public function __construct(string $code, string $name, ?string $description)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

}
