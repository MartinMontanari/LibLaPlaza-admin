<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\DeleteCategoryCommand;
use App\Infraestructure\Persistence\Eloquent\Repositories\CategoryRepository;

class DeleteCategoryHandler
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param DeleteCategoryCommand $command
     */
    public function handle(DeleteCategoryCommand $command)
    {
        $this->repository->deleteOne($command->getId());
    }
}
