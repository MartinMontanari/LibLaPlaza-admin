<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Products\StoreProductCommand;
use App\Domain\Entities\Product;
use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use Money\Money;

class StoreProductHandler
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private ProviderRepository $providerRepository;

    /**
     * StoreProductHandler constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param ProviderRepository $providerRepository
     */
    public function __construct
    (
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ProviderRepository $providerRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->providerRepository = $providerRepository;
    }

    /**
     * @param StoreProductCommand $command
     * @return bool
     */
    public function handle(StoreProductCommand $command)
    {
        $product = new Product();
        $product->setCode($command->getCode());
        $product->setName($command->getName());
        $price = Money::ARS($command->getPrice() * 100);
        $product->setPrice($price->getAmount());
        $product->setDescription($command->getDescription());
        $product->setCategoryId($command->getCategoryId());
        $product->setProviderId($command->getProviderId());

        $this->productRepository->persist($product);

        //TODO hacer la parte de stock
    }

    /**
     * @return array
     */
    public function viewData() : array
    {
        $providers = $this->providerRepository->findAll();
        $categories = $this->categoryRepository->findAll();

        return [$providers, $categories];
    }
}
