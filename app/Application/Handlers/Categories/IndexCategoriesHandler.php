<?php


namespace App\Application\Handlers\Categories;


use App\Application\Queries\Categories\IndexCategoryQuery;
use App\Infraestructure\Persistence\Eloquent\Repositories\CategoryRepository;

class IndexCategoriesHandler
{
    private CategoryRepository $repository;

    public function __construct
    (
        CategoryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param IndexCategoryQuery $query
     * @return array
     */
    public function handle(IndexCategoryQuery $query)
    {
        return $this->repository->findAll($query->getPage(), $query->getSize());
    }
}
