<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

	protected $fillable = ['category_id','name','description','price','featured','recommend'];
	
	public function category() 
	{
	    return $this->belongsTo('CodeCommerce\Category');
	}

	public function images()
	{
	    return $this->hasMany('CodeCommerce\ProductImage');
	}

	public function tags()
	{
	   return $this->belongsToMany('CodeCommerce\Tag');
	}
	
	public function getTagListAttribute()
	{
	    $data = NULL;
	    $tags = NULL;
	    
	    $data = $this->tags()->lists('name');

	    if(!empty($data))
	       $tags = implode(',', $data);
	    
	    return $tags;
	}
	
	public function processingTags($tagsForm = null)
	{
	    $tagsId = [];
	    
	    if(!empty($tagsForm['tags'])):
	    
    	    $tags = Tag::lists('id','name');
    	    
    	    $tagsInversed = array_flip($tags);

    	    $tagsForm = explode(',', $tagsForm['tags']);
    	    
    	    foreach($tagsForm as $tag){

    	        if (array_key_exists($tag, $tags)) { // se existir cadastro da tag
    	             
    	            $tagsId[] = array_search($tag, $tagsInversed);
    
    	        }else{ // se não existir cadastro da tag
    
    	            $newTag = Tag::create(['name'=>$tag]);
    	             
    	            $tagsId[] = $newTag->id;
    	        }
    	    }
    	    
    	endif;
	    
	    return $tagsId;

	}

}


