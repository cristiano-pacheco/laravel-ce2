<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;

class CategoriesController extends Controller 
{
    private $categoriesModel;
    
    public function __construct(Category $category)
    {
        $this->categoriesModel = $category;
    }

	public function index()
	{
	    $categories = $this->categoriesModel->paginate(10);
	    return view('categories.index',compact('categories'));
	}
	
	public function create()
	{
	    return view('categories.create');
	}
	
	public function store(CategoryRequest $request)
	{
	    $input = $request->all();
	    $category = $this->categoriesModel->fill($input);
	    $category->save();
	    return redirect()->route('categories');
	}
	
	public function destroy($id)
	{
	    $this->categoriesModel->find($id)->delete();
	    return redirect()->route('categories');
	}
	
	public function edit($id)
	{
	    $category = $this->categoriesModel->find($id);
	    return view('categories.edit',compact('category'));
	}
	
	public function update(CategoryRequest $request, $id) 
	{
	    $this->categoriesModel->find($id)->update($request->all());
	    return redirect()->route('categories');
	}

}
