<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Products\StoreProductCommand;
use App\Application\Handlers\Stock\StartStockHandler;
use App\Application\Services\StockService;
use App\Domain\Entities\Product;
use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;
use Money\Money;

class StoreProductHandler
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private ProviderRepository $providerRepository;
    private StartStockHandler $startStockHandler;

    /**
     * StoreProductHandler constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param ProviderRepository $providerRepository
     * @param StartStockHandler $startStockHandler
     */
    public function __construct
    (
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ProviderRepository $providerRepository,
        StartStockHandler $startStockHandler
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->providerRepository = $providerRepository;
        $this->startStockHandler = $startStockHandler;
    }

    /**
     * @param StoreProductCommand $command
     * @throws AlreadyExistsException
     */
    public function handle(StoreProductCommand $command)
    {
        $searchedByCode = $this->productRepository->getOneByCode($command->getCode());
        if (isset($searchedByCode)) {
            throw new AlreadyExistsException(
                ["El código {$searchedByCode->getCode()} ya existe.",
                    "Corresponde al producto {$searchedByCode->getName()}.",
                    "Ingrese otro código e intente nuevamente."]
            );
        }

        $product = new Product();
        $product->setCode($command->getCode());
        $product->setName($command->getName());
        $price = Money::ARS($command->getPrice());
        $product->setPrice($price);
        $product->setDescription($command->getDescription());
        $product->setCategoryId($command->getCategoryId());
        $product->setProviderId($command->getProviderId());

        $this->productRepository->persist($product);
        $this->startStockHandler->start($product->getId());
    }

    /**
     * @return array
     */
    public function viewData(): array
    {
        $providers = $this->providerRepository->findAll();
        $categories = $this->categoryRepository->findAll();

        return [$providers, $categories];
    }
}
