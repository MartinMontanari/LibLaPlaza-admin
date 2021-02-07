<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Product;
use App\Domain\Interfaces\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
     * @param string $code
     * @return Product|null
     */
    public function getOneByCode(string $code): ?Product
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

    /**
     * @param string|null $query
     * @return Builder[]|Collection
     */
    public function getManyByQuery(?string $query)
    {
        return Product::query()->where('name','like', '%'.$query.'%')
            ->orWhere('description','like', '%'.$query.'%')
            ->orWhere('code','=', $query)
            ->get();
    }
}
