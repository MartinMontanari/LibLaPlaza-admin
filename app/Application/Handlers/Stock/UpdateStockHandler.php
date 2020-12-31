<?php


namespace App\Application\Handlers\Stock;


use App\Application\Commands\Stock\UpdateStockCommand;
use App\Domain\Entities\Stock;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\StockRepository;
use App\Exceptions\EntityNotFoundException;

class UpdateStockHandler
{
    private StockRepository $stockRepository;

    /**
     * UpdateStockHandler constructor.
     * @param StockRepository $stockRepository
     */
    public function __construct
    (
        StockRepository $stockRepository
    )
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * @param int $product_id
     * @return Stock
     */
    public function index(int $product_id) : Stock
    {
        return $this->stockRepository->getProductStock($product_id);
    }

    /**
     * @param UpdateStockCommand $command
     * @throws EntityNotFoundException
     */
    public function handle(UpdateStockCommand $command)
    {
        $stock = $this->stockRepository->getProductStock($command->getProductId());

        if(isset($stock) && $stock->getProduct()->getId() == $command->getProductId()){
            $stock->setQuantity($command->getQuantity());
        }
        else{
            throw new EntityNotFoundException(['Ocurrió un error.', 'No se ha encontrado el producto seleccionado o bien la relación no es correcta.']);
        }

        $this->stockRepository->persist($stock);
    }

}
