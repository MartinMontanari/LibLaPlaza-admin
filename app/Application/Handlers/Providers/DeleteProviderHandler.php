<?php


namespace App\Application\Handlers\Providers;


use App\Application\Commands\Providers\DeleteProviderCommand;
use App\Domain\Interfaces\ProviderRepository;

class DeleteProviderHandler
{
    private ProviderRepository $repository;

    /**
     * DeleteProviderHandler constructor.
     * @param ProviderRepository $providerRepository
     */
    public function __construct
    (
        ProviderRepository $providerRepository
    )
    {
        $this->repository = $providerRepository;
    }

    public function handle(DeleteProviderCommand $command)
    {
        $this->repository->deleteOneById($command->getId());
    }
}
