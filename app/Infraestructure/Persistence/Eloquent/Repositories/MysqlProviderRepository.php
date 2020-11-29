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
     * @param int $code
     * @return Provider
     */
    public function getOneByCode(string $code): ?Provider
    {
        return Provider::query()
            ->where('code', '=', $code)
            ->first();
    }
}
