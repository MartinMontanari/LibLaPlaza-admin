<?php


namespace App\Application\Commands\Categories;


class StoreCategoryCommand
{
    private string $name;
    private string $description;

    /**
     * StoreCategoryCommand constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name=$name;
        $this->description=$description;
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
    public function getDescription(): string
    {
        return $this->description;
    }

}
