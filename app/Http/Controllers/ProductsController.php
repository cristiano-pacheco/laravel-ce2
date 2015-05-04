<?php
namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;

class ProductsController extends Controller 
{
    private $productsModel;
    
    public function __construct(Product $product) {
        $this->productsModel = $product;
    }
    
    public function index()
    {
        $products = $this->productsModel->all();
        return view('products.index',compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productsModel->fill($input);
        $product->save();
        return redirect()->route('products');
    }
    
    public function edit($id)
    {
        $product = $this->productsModel->find($id);
        return view('products.edit',compact('product'));
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
