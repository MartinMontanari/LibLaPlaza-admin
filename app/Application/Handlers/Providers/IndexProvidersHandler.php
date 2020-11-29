<?php


namespace App\Application\Handlers\Providers;


use App\Application\Queries\Providers\IndexProvidersQuery;
use App\Domain\Interfaces\ProviderRepository;

class IndexProvidersHandler
{
    private ProviderRepository $repository;

    /**
     * IndexProvidersHandler constructor.
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
     * @param IndexProvidersQuery $query
     * @return mixed|string
     */
    public function handle(IndexProvidersQuery $query)
    {
        if($this->repository->findAll($query->getPage(), $query->getSize())!=null){
            return $this->repository->findAll($query->getPage(), $query->getSize());
        }
        else{
            return 'No hay proveedores registrados.';
        }
    }
}
