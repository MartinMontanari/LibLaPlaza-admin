<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Category;

interface CategoryRepository
{
    /**
     * @param Category $category
     */
    public function persist(Category $category) : void;

    /**
     * @param int|null $page
     * @param int|null $size
     * @return mixed
     */
    public function findAll(?int $page, ?int $size);

    /**
     * @param int $id
     * @return Category
     */
    public function getOneByIdOrFail(int $id): Category;

    /**
     * @param string $name
     * @return Category|null
     */
    public function getOneByName(string $name) : ?Category;

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteOne(int $id);
}
