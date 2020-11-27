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

    /**
     * @param StoreCategoryCommand $command
     */
    public function handle(StoreCategoryCommand $command) : void
    {

        $category = new Category();
        $searchedByName = $this->repository->getOneByeNameOrFail($command->getName());

        if(isset($searchedByName))
        {
            throw new AlreadyExistsException(['message'=> 'La categoría ya existe.']);
        }
        $category->setName($command->getName());
        $category->setDescription($command->getDescription());

        $this->repository->persist($category);
    }

}
