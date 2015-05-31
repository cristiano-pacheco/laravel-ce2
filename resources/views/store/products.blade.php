<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--features_items-->
		<h2 class="title text-center">Em destaque</h2>
        
        @include('store.partial.products',['products'=>$produtosFeatured])
            
	</div>
	<!--features_items-->
	<div class="features_items">
		<!--recommended-->
		<h2 class="title text-center">Recomendados</h2>
        
        @include('store.partial.products',['products'=>$produtosRecommended])
        
	</div>
	<!--recommended-->

</div>