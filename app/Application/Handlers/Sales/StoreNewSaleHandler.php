<?php


namespace App\Application\Handlers\Sales;


use App\Application\Commands\Sales\StoreNewSaleCommand;
use App\Domain\Entities\Customer;
use App\Domain\Entities\ProductSale;
use App\Domain\Entities\Sale;
use App\Domain\Interfaces\CustomerRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\SaleRepository;
use App\Domain\Interfaces\StockRepository;
use App\Exceptions\UnprocessableEntityException;
use Illuminate\Support\Facades\DB;

class StoreNewSaleHandler
{
    private SaleRepository $saleRepository;
    private CustomerRepository $customerRepository;
    private ProductRepository $productRepository;
    private StockRepository $stockRepository;

    public function __construct
    (
        SaleRepository $saleRepository,
        CustomerRepository $customerRepository,
        ProductRepository $productRepository,
        StockRepository $stockRepository
    )
    {
        $this->saleRepository = $saleRepository;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->stockRepository = $stockRepository;

    }

    /**
     * @param StoreNewSaleCommand $command
     * @throws UnprocessableEntityException
     */
    public function handle(StoreNewSaleCommand $command)
    {
        DB::beginTransaction();
        try {
            $sale = new Sale();

            $sale->setBillSerieAndBillNumber($command->getBillSerie() . '-' . $command->getBillNumber());
            $sale->setBillType($command->getBillType());

            if (!is_null($customer = $this->customerRepository->getCustomerByDni($command->getDni()))) {
                $sale->setCustomer($customer);
            } else {
                $customer = new Customer();
                $customer->setFullName($command->getFullName());
                $customer->setDni($command->getDni());
                $customer->setAddress($command->getAddress());

                $this->customerRepository->persist($customer);
                $sale->setCustomer($customer);
            }

            $products = $command->getProducts();

            foreach ($products as $item) {
                $product = $this->productRepository->getOneByIdOrFail($item['id']);
                $stock = $product->getStock();
                if (!$stock->hasStock()) {
                    throw new UnprocessableEntityException('El producto no tiene stock.');
                }
                $stock->decreaseQuantity(intval($item['quantity']));

                $productSale = new ProductSale();

                $productSale->setProduct($product);
                $productSale->setSale($sale);
                $productSale->save();

                $stock->save();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
