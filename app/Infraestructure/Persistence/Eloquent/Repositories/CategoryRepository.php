<?php


namespace App\Infraestructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Category;

class CategoryRepository
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function persist(Category $category) : void
    {
        $category->save();
    }

    public function findAll(Category $category) : void
    {
    //TODO terminar
    }
}
