<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\StoreCategoryCommand;
use App\Domain\Entities\Category;
use App\Infraestructure\Persistence\Eloquent\Repositories\CategoryRepository;

class StoreCategoryHandler
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(StoreCategoryCommand $command){

        $category = new Category();
        $category->setName($command->getName());
        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
    }

}
