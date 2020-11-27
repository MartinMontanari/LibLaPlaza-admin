<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\StoreCategoryCommand;
use App\Domain\Entities\Category;
use App\Exceptions\AlreadyExistsException;
use App\Infraestructure\Persistence\Eloquent\Repositories\CategoryRepository;

class StoreCategoryHandler
{
    private CategoryRepository $repository;

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
        $searchedByName = $this->repository->getOneByeNameOrFail($command->getName());

        $category->setName($command->getName());
        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
        if(isset($searchedByName))
        {
            throw new AlreadyExistsException('La categoría ya existe.');
        }
    }

}
