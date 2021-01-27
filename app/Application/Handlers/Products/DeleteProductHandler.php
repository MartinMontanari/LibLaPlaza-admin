<?php


namespace App\Application\Handlers\Products;


use App\Application\Commands\Products\DeleteProductCommand;
use App\Domain\Interfaces\ProductRepository;
use App\Exceptions\ResultNotFoundException;

class DeleteProductHandler
{
    private ProductRepository $productRepository;

    /**
     * DeleteProductHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param DeleteProductCommand $command
     * @throws ResultNotFoundException
     */
    public function handle(DeleteProductCommand $command)
    {
        $product = $this->productRepository->getOneByIdOrFail($command->getId());

        if (isset($product) && $product->getId() == $command->getId()) {
            $this->productRepository->deleteOneById($command->getId());
        }
        else{
            throw new ResultNotFoundException(['Ocurrió un error.', 'No se ha encontrado el producto seleccionado o bien la relación no es correcta.']);
        }
    }
}
