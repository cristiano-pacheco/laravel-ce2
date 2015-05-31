<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

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
	
	public function category($id)
	{
    
	    $categories = Category::all();
	    $category = Category::find($id);
	    $products = Product::ofCategory($id)->get();
	     
	    return view('store.category',compact('categories','products','category'));
	}
	
	public function product($id)
	{
	    $categories = Category::all();
	    $product = Product::find($id);
	    $tags = Product::ofTag($id)->get();
	    
	    return view('store.product',compact('categories','product','tags'));
	}
	
	public function tag($id)
	{
	
	    $categories = Category::all();
	    $tag = Tag::find($id);
	    $products = $tag->products;

	    return view('store.tag',compact('categories','products','tag'));
	}

}
