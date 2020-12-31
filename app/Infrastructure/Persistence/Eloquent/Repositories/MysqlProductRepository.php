<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Product;
use App\Domain\Interfaces\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MysqlProductRepository implements ProductRepository
{
    /**
     * @param Product $product
     */
    public function persist(Product $product): void
    {
        $product->save();
    }

    /**
     * @param int|null $page
     * @param int|null $size
     * @return LengthAwarePaginator|mixed
     */
    public function getAll(?int $page, ?int $size)
    {
        return Product::query()
            ->take($page)
            ->limit($size)
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return Product
     */
    public function getOneByIdOrFail(int $id): Product
    {
     return Product::query()
         ->where('id','=',$id)
         ->firstOrFail();
    }

    /**
     * @param int $code
     * @return Product
     */
    public function getOneByCode(string $code): Product
    {
        return Product::query()
            ->where('code','=',$code)
            ->first();
    }

    /**
     * @param int $id
     */
    public function deleteOneById(int $id): void
    {
        Product::query()
            ->where('id','=', $id)
            ->delete();
    }
}
