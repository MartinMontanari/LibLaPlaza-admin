<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Providers\UpdateProviderCommand;
use App\Domain\Entities\Product;
use App\Domain\Entities\Provider;
use App\Domain\Interfaces\ProductRepository;
use App\Exceptions\AlreadyExistsException;

class UpdateProductHandler
{
    private ProductRepository $repository;

    /**
     * UpdateProductHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->repository = $productRepository;
    }


    /**
     * @param int $id
     * @return Product
     */
    public function index(int $id) : Product
    {
        return $this->repository->getOneByIdOrFail($id);
    }

    //TODO fix import and php docs - made UC
//    public function handle(UpdateProductCommand $command)
//    {
//        $searchedByCode = $this->repository->getOneByCode($command->getCode());
//        if(isset($searchedByCode) && $searchedByCode==$command->getCode())
//        {
//            throw new AlreadyExistsException(
//                ["El código {$searchedByCode->getCode()} ya existe.",
//                    "Corresponde al proveedor {$searchedByCode->getName()}.",
//                    "Ingrese otro."]
//            );
//        }
//
//        $provider = $this->repository->getOneByIdOrFail($command->getId());
//
//        $provider->setCode($command->getCode());
//        $provider->setName($command->getName());
//
//        $description = $command->getDescription();
//        if(isset($description))
//        {
//            $provider->setDescription($command->getDescription());
//        }
//
//        $this->repository->persist($provider);
//    }

}
