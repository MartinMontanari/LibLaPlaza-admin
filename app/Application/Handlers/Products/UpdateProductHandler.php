<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Products\UpdateProductCommand;
use App\Application\Services\StockService;
use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\ResultNotFoundException;
use Money\Money;

class UpdateProductHandler
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
     * @param int $id
     * @return array
     * @throws ResultNotFoundException
     * View data and nurture
     */
    public function index(int $id): array
    {
        $providers = $this->providerRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $product = $this->productRepository->getOneByIdOrFail($id);
        if (!isset($product)) {
            throw new ResultNotFoundException(
                ["No se encontraron resultados, hubo un error."
                    , "Seleccione otro producto e intente nuevamente."]);
        }
        $productPrice = $product->getPrice()->getAmount() / 100;

        return [$providers, $categories, $product, $productPrice];
    }

    /**
     * @param UpdateProductCommand $command
     * @throws AlreadyExistsException|EntityNotFoundException
     * Use case handler
     */

    public function handle(UpdateProductCommand $command)
    {
        $searchedByCode = $this->productRepository->getOneByCode($command->getCode());
        if (isset($searchedByCode) && $searchedByCode->getId() != $command->getId()) {
            throw new AlreadyExistsException(
                ["El código [{$searchedByCode->getCode()}] ya existe.",
                    "Corresponde al producto [{$searchedByCode->getName()}].",
                    "Ingrese otro código e intente nuevamente."]
            );
        }

        $product = $this->productRepository->getOneByIdOrFail($command->getId());
        if (!isset($product)) {
            throw new EntityNotFoundException(
                ["No se encontraron resultados, hubo un error."
                    , "Seleccione otro producto e intente nuevamente."]);
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
