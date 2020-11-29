<?php


namespace App\Application\Handlers\Providers;


use App\Application\Commands\Providers\StoreProviderCommand;
use App\Domain\Entities\Provider;
use App\Domain\Interfaces\ProviderRepository;

class StoreProviderHandler
{
    private ProviderRepository $repository;

    public function __construct
    (
        ProviderRepository $providerRepository
    )
    {
        $this->repository = $providerRepository;
    }

    public function handle(StoreProviderCommand $command): void
    {
        $provider = new Provider();

        $provider->setCode($command->getCode());
        $provider->setName($command->getName());

        $description = $command->getDescription();
        if (isset($description)) {
            $provider->setDescription($command->getDescription());
        }

        $this->repository->persist($provider);
    }
}
