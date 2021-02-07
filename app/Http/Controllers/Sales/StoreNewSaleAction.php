<?php


namespace App\Http\Controllers\Sales;


use App\Application\Handlers\Sales\StoreNewSaleHandler;
use App\Exceptions\InvalidBodyException;
use App\Exceptions\UnprocessableEntityException;
use App\Http\Adapters\Sales\StoreNewSaleAdapter;
use App\Http\Enums\HttpCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreNewSaleAction
{
    private StoreNewSaleHandler $storeNewSaleHandler;
    private StoreNewSaleAdapter $storeNewSaleAdapter;

    public function __construct
    (
        StoreNewSaleHandler $storeNewSaleHandler,
        StoreNewSaleAdapter $storeNewSaleAdapter
    )
    {
        $this->storeNewSaleHandler = $storeNewSaleHandler;
        $this->storeNewSaleAdapter = $storeNewSaleAdapter;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request  $request)
    {
        try{
            $command = $this->storeNewSaleAdapter->adapt($request);
            $this->storeNewSaleHandler->handle($command);

            return new JsonResponse(['Venta concretada correctamente.', HttpCodes::OK]);
        } catch (InvalidBodyException $errors){
            return new JsonResponse([$errors->getMessages(), $errors->getCode()]);
        }
        catch (UnprocessableEntityException $errors){
            return new JsonResponse([$errors->getMessages(), $errors->getCode()]);
        }
        catch (\Exception $errors){
            return new JsonResponse([$errors->getMessage(), $errors->getCode()]);
        }
    }
}
