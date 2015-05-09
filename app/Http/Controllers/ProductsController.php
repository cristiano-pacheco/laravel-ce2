<?php
namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Category;

class ProductsController extends Controller 
{
    private $productsModel;
    
    public function __construct(Product $product) {
        $this->productsModel = $product;
    }
    
    public function index()
    {
        $products = $this->productsModel->paginate(10);
        return view('products.index',compact('products'));
    }
    
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        
        return view('products.create',compact('categories'));
    }
    
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productsModel->fill($input);
        $product->save();
        return redirect()->route('products');
    }
    
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');
        
        $product = $this->productsModel->find($id);
        return view('products.edit',compact('product','categories'));
    }
    
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        
        if(!isset($data['featured'])){
            $data['featured'] = false;
        }
        
        if(!isset($data['recommend'])){
            $data['recommend'] = false;
        }
        
        $this->productsModel->find($id)->update($data);
        return redirect()->route('products');
    }
    
    public function destroy($id)
    {
        $this->productsModel->find($id)->delete();
        return redirect()->route('products');
    }

}
