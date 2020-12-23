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

        //TODO hacer la parte de stock
    }
}
