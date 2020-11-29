<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\EditCategoryCommand;
use App\Domain\Entities\Category;
use App\Domain\Interfaces\CategoryRepository;

class UpdateCategoryHandler
{
    private CategoryRepository $repository;

    /**
     * UpdateCategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct
    (
        CategoryRepository $categoryRepository
    )
    {
        $this->repository = $categoryRepository;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function index(int $id) : Category
    {
        return $this->repository->getOneByIdOrFail($id);
    }

    /**
     * @param EditCategoryCommand $command
     */
    public function handle(EditCategoryCommand $command)
    {
        $category = $this->repository->getOneByIdOrFail($command->getId());
        $category->setName($command->getName());

        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
    }
}
