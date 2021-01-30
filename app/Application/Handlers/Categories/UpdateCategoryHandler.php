<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\UpdateCategoryCommand;
use App\Domain\Entities\Category;
use App\Domain\Interfaces\CategoryRepository;
use App\Exceptions\EntityNotFoundException;

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
     * @param UpdateCategoryCommand $command
     * @throws EntityNotFoundException
     */
    public function handle(UpdateCategoryCommand $command)
    {
        $category = $this->repository->getOneByIdOrFail($command->getId());
        if(!isset($category)){
            throw new EntityNotFoundException("Categoría no encontrada.");
        }
        $category->setName($command->getName());

        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
    }
}
