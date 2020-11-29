<?php


namespace App\Application\Commands\Categories;


class DeleteCategoryCommand
{

    private int $id;

    /**
     * DeleteCategoryCommand constructor.
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
