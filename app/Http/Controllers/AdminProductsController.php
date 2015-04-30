<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

	private $products;
	
	public function __construct(Product $product)
	{
	    $this->products = $product;
	}
	
	public function index()
	{
	    $products = $this->products->all();
	    
	    return view('admin.products.index',compact('products'));
	}

}
