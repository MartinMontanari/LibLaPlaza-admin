<?php


namespace App\Infraestructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Category;
use App\Domain\Interfaces\CategoryRepository;

class MysqlCategoryRepository implements CategoryRepository
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param Category $category
     */
    public function persist(Category $category): void
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
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return Category
     */
    public function getOneByIdOrFail(int $id): Category
    {
        return Category::query()
            ->where('id','=',$id)
            ->firstOrFail();
    }

    /**
     * @param string $name
     * @return Category
     */
    public function getOneByName(string $name) : ?Category
    {
        return Category::query()
            ->where('name','=',$name)
            ->first();
    }

    /**
     * @param int $id
     */
    public function deleteOne(int $id)
    {
        Category::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
