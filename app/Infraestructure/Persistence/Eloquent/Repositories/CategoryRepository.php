<?php


namespace App\Infraestructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Category;

class CategoryRepository
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function persist(Category $category) : void
    {
        $category->save();
    }

    /**
     *
     * @param int|null $page
     * @param int|null $size
     * @return Category[]
     */
    public function findAll(?int $page = 0, ?int $size = 10)
    {
        return Category::query()
            ->take($page)
            ->limit($size)
            ->get();
    }
}
