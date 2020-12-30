<?php


namespace App\Application\Handlers\Providers;


use App\Application\Commands\Providers\UpdateProviderCommand;
use App\Domain\Entities\Provider;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;

class UpdateProviderHandler
{
    private ProviderRepository $repository;

    /**
     * UpdateProviderHandler constructor.
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
     * @param int $id
     * @return Provider
     */
    public function index(int $id): Provider
    {
        return $this->repository->getOneByIdOrFail($id);
    }

    /**
     * @param UpdateProviderCommand $command
     * @throws AlreadyExistsException
     */
    public function handle(UpdateProviderCommand $command)
    {
        $searchedByCode = $this->repository->getOneByCode($command->getCode());
        if (isset($searchedByCode) && $searchedByCode->getId() != $command->getId()) {
            throw new AlreadyExistsException(
                ["El código {$searchedByCode->getCode()} ya existe.",
                    "Corresponde al proveedor {$searchedByCode->getName()}.",
                    "Ingrese otro."]
            );
        }

        $provider = $this->repository->getOneByIdOrFail($command->getId());

        $provider->setCode($command->getCode());
        $provider->setName($command->getName());

        $description = $command->getDescription();
        if (isset($description)) {
            $provider->setDescription($command->getDescription());
        }

        $this->repository->persist($provider);
    }
}
