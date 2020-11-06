<?php


namespace App\Http\Actions\Categories;


use App\Application\Handlers\Categories\UpdateCategoryHandler;
use App\Domain\Entities\Category;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\UpdateCategoryAdapter;
use Illuminate\Http\Request;

class UpdateCategoryAction
{
    private UpdateCategoryHandler $handler;
    private UpdateCategoryAdapter $adapter;
    public function __construct
    (
        UpdateCategoryHandler $handler,
        UpdateCategoryAdapter $adapter
    )
    {
        $this->handler = $handler;
        $this->adapter = $adapter;
    }

    public function index(Request $request){
        $category = Category::query()->findOrFail($request->query('id'));
        return view('admin.categories.edit',['category'=>$category]);
    }
    public function __invoke(Request $request)
    {
        try{
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->back()->with('status','Categoría editada correctamente.');
        }catch (InvalidBodyException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
