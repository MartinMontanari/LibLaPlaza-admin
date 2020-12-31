<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Products\UpdateProductCommand;
use App\Application\Services\StockService;
use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\EntityNotFoundException;
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
     * View data and nurture
     */
    public function index(int $id): array
    {
        $providers = $this->providerRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $product = $this->productRepository->getOneByIdOrFail($id);
        $productPrice = $product->getPrice()->getAmount() / 100;

        return [$providers, $categories, $product, $productPrice];
    }

    /**
     * @param UpdateProductCommand $command
     * @throws AlreadyExistsException
     * @throws EntityNotFoundException
     * Use case handler
     */

    public function handle(UpdateProductCommand $command)
    {
        $searchedByCode = $this->productRepository->getOneByCode($command->getCode());
        if (isset($searchedByCode) && $searchedByCode->getId() != $command->getId()) {
            throw new AlreadyExistsException(
                ["El código {$searchedByCode->getCode()} ya existe.",
                    "Corresponde al producto {$searchedByCode->getName()}.",
                    "Ingrese otro."]
            );
        }

        $product = $this->productRepository->getOneByIdOrFail($command->getId());
        if (isset($product)) {

        } else {
            throw new EntityNotFoundException("La entidad no existe.", 404);
        }

        $product->setCode($command->getCode());
        $product->setName($command->getName());
        $product->setDescription($command->getDescription());
        $price = Money::ARS($command->getPrice());
        $product->setPrice($price);
        $description = $command->getDescription();
        if (isset($description)) {
            $product->setDescription($command->getDescription());
        }
        $product->setProviderId($command->getProviderId());
        $product->setCategoryId($command->getCategoryId());

        $this->productRepository->persist($product);
    }

}
