<?php


namespace App\Application\Commands\Providers;


class UpdateProviderCommand
{
    private int $id;
    private string $code;
    private string $name;
    private ?string $description;

    /**
     * UpdateProviderCommand constructor.
     * @param int $id
     * @param string $code
     * @param string $name
     * @param string|null $description
     */
    public function __construct(int $id, string $code, string $name, ?string $description)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

}
