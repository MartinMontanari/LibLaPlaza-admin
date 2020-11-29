<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\DeleteCategoryCommand;
use App\Domain\Interfaces\CategoryRepository;

class DeleteCategoryHandler
{
    private CategoryRepository $repository;

    /**
     * DeleteCategoryHandler constructor.
     * @param CategoryRepository $repository
     */
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
