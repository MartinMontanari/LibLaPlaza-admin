<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Provider;

interface ProviderRepository
{
    /**
     * @param Provider $provider
     */
    public function persist(Provider $provider) : void;
}
