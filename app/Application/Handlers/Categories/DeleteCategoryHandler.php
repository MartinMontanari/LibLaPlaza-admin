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


    public function handle(DeleteCategoryCommand $command)
    {

    }
}
