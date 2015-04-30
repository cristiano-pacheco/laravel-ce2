<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller {

	private $categories;
	
	public function __construct(Category $category) 
	{
	   $this->categories = $category;    
	}
	
	public function index()
	{
	    $categories = $this->categories->all();
	    return view('admin.categories.index',compact('categories'));
	}

}
