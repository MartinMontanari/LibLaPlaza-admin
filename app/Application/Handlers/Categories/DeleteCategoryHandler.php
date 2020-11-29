<?php


namespace App\Application\Handlers\Categories;


use App\Application\Commands\Categories\DeleteCategoryCommand;
use App\Infraestructure\Persistence\Eloquent\Repositories\MysqlCategoryRepository;

class DeleteCategoryHandler
{
    private MysqlCategoryRepository $repository;

    public function __construct(MysqlCategoryRepository $repository)
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
