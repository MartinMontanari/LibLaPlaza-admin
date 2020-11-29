<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\StoreCategoryCommand;
use App\Domain\Entities\Category;
use App\Domain\Interfaces\CategoryRepository;
use App\Exceptions\AlreadyExistsException;
class StoreCategoryHandler
{
    private CategoryRepository $repository;

    /**
     * StoreCategoryHandler constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param StoreCategoryCommand $command
     * @throws AlreadyExistsException
     */
    public function handle(StoreCategoryCommand $command) : void
    {

        $category = new Category();
        $searchedByName = $this->repository->getOneByName($command->getName());

        if(isset($searchedByName))
        {
            throw new AlreadyExistsException(["La categoría {$searchedByName->getName()} ya existe."]);
        }

        $category->setName($command->getName());
        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
    }

}
