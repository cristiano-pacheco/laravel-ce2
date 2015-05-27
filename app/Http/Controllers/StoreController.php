<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller 
{

	public function index()
	{
	    $produtosFeatured = Product::featured()->get();
	    $produtosRecommended = Product::recommended()->get();
	    
	    $categories = Category::all();
	    
	    return view('store.index',compact('categories','produtosFeatured','produtosRecommended'));
	}
	
	public function listByCategory($idCategory)
	{
	    
	    $produtos = Product::where('category_id','=',$idCategory)->get();
	    
	    $category = Category::find($idCategory);
	    
	    $categories = Category::all();
	     
	    return view('store.listByCategory',compact('categories','produtos','category'));
	}

}
