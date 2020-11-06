<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\EditCategoryCommand;
use App\Domain\Entities\Category;
use App\Infraestructure\Persistence\Eloquent\Repositories\CategoryRepository;

class UpdateCategoryHandler
{
    private CategoryRepository $repository;

    public function __construct
    (
        CategoryRepository $categoryRepository
    )
    {
        $this->repository = $categoryRepository;
    }

    /**
     * @param EditCategoryCommand $command
     */
    public function handle(EditCategoryCommand $command)
    {
        $category = $repository->getOneByIdOrFail($command->getId());
        $category->setName($command->getName());
        $category->setDescription($command->getDescription());

        $this->repository->persist($category);

    }
}
