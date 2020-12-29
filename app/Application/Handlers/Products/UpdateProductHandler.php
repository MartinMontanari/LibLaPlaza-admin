<?php


namespace App\Application\Handlers\Products;


use App\Application\Services\StockService;
use App\Domain\Entities\Product;
use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;
use Money\Money;

class UpdateProductHandler
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private ProviderRepository $providerRepository;
    private StockService $stockService;

    /**
     * StoreProductHandler constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param ProviderRepository $providerRepository
     * @param StockService $stockService
     */
    public function __construct
    (
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ProviderRepository $providerRepository,
        StockService $stockService
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->providerRepository = $providerRepository;
        $this->stockService = $stockService;
    }


    /**
     * @param int $id
     * @return array
     */
    public function index(int $id) : array
    {
        $providers = $this->providerRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $product = $this->productRepository->getOneByIdOrFail($id);
        $productPrice = Money::ARS( strval($product->getPrice())/ 100);


        return [$providers, $categories, $product, $productPrice];
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
