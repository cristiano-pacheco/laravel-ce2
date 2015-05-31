<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--features_items-->
		<h2 class="title text-center">Categoria - {{ $category->name  }}</h2>
        
        @include('store.partial.products',['products'=>$products])
        
	</div>
	<!--features_items-->
</div>