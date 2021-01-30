<?php


namespace App\Application\Handlers\Providers;


use App\Application\Commands\Providers\StoreProviderCommand;
use App\Domain\Entities\Provider;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;

class StoreProviderHandler
{
    private ProviderRepository $repository;

    /**
     * StoreProviderHandler constructor.
     * @param ProviderRepository $providerRepository
     */
    public function __construct
    (
        ProviderRepository $providerRepository
    )
    {
        $this->repository = $providerRepository;
    }

    /**
     * @param StoreProviderCommand $command
     * @throws AlreadyExistsException
     */
    public function handle(StoreProviderCommand $command): void
    {
        $provider = new Provider();

        $searchedByCode = $this->repository->getOneByCode($command->getCode());
        if (isset($searchedByCode))
        {
            throw new AlreadyExistsException(
                ["El código [{$searchedByCode->getCode()}] ya existe.",
                    "Corresponde al proveedor [{$searchedByCode->getName()}].",
                    "Ingrese otro."]
            );
        }
        $provider->setCode($command->getCode());
        $provider->setName($command->getName());

        $description = $command->getDescription();
        if (isset($description)) {
            $provider->setDescription($command->getDescription());
        }

        $this->repository->persist($provider);
    }
}
