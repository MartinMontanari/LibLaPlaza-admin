<?php


namespace App\Infraestructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Provider;
use App\Domain\Interfaces\ProviderRepository;

class MysqlProviderRepository implements ProviderRepository
{
    /**
     * @param Provider $provider
     */
    public function persist(Provider $provider): void
    {
        $provider->save();
    }

    /**
     * @param int|null $page
     * @param int|null $size
     * @return mixed
     */
    public function findAll(?int $page = 0, ?int $size = 10)
    {
        return Provider::query()
            ->take($page)
            ->limit($size)
            ->paginate(10);
    }

    /**
     * @param int $code
     * @return Provider
     */
    public function getOneByCode(string $code): ?Provider
    {
        return Provider::query()
            ->where('code', '=', $code)
            ->first();
    }

    /**
     * @param int $id
     */
    public function deleteOneById(int $id) : void
    {
        Provider::query()
            ->where('id','=',$id)
            ->delete();
    }

}
