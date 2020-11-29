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
}
