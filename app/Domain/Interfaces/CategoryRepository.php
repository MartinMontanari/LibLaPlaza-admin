<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Category;

interface CategoryRepository
{
    public function persist(Category $category) : void;

    public function findAll(?int $page = 0, ?int $size = 10);

    public function getOneByIdOrFail(int $id): Category;

    public function getOneByName(string $name) : ?Category;

    public function deleteOne(int $id);
}
