@extends('store.store')

@section('content')
   
  <section id="cart_items">
     
     <div class="container">
     
        <div class="table-responsive cart_info">
            
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="price">Quantidade</td>
                        <td class="price">Total</td>
                        <td class="price"></td>
                    </tr>
                </thead>
                
                <tbody>
                
                @forelse($cart->all() as $k => $item)
                    <tr data-id="{{ $k }}">
                        <td class="cart_product"> 
                            <a href="{{ route('store.product',['id'=>$k])}}">
                                Imagem
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4>
                                <a href="{{ route('store.product',['id'=>$k])}}">
                                    {{ $item['name'] }}
                                </a>
                            </h4>
                            <p> Código: {{ $k }}</p>
                        </td>
                        
                        <td class="cart_price">
                            R$ {{ $item['price'] }}   
                        </td>
                        
                        <td class="cart_quantity">
                           <div class="col-md-2">
                           {!! Form::text('qtd',$item['qtd'], ['class'=>"form-control qtd",'maxlength'=>'2']) !!}
                           </div> 
                        </td>
                        
                        <td class="cart_total">
                            <p class="cart_total_price"> R$ {{ $item['price'] * $item['qtd'] }}</p>
                        </td>
                        
                        <td class="cart_delete">
                            <a href="{{ route('cart.destroy',['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                        </td>
                        
                        
                    </tr>
                  @empty
                  
                     <tr>
                         <td class="" colspan="6">
                            <p>Nenhum Item encontrado.</p>
                         </td>
                     </tr>
                    
                  @endforelse 
                  
                  <tr class="cart_menu">
                    <td colspan="6">
                        <div class="pull-right">
                            <span style="margin-right: 100px;">
                                TOTAL: R$ {{ $cart->getTotal() }}    
                            </span>
                            
                            <a href="" class="btn btn-success">Fechar a conta</a>
                            
                        </div>
                    </td>
                  </tr>
                </tbody>
            
            </table>
            
        </div>
        
     </div>
    
  </section>
   
@stop

@section('scripts')
<script>

function updateCart(obj){
	alert(obj);
}

$(function(){

	$('.qtd').on('focusout', function(e){

		var row = $(this).parents('tr');
		var id = row.data('id');

		var qtd = $(this).val();

		if(qtd <=0)
		{
			alert('A quantidade do produto deve ser maior que 0');
			$(this).focus();
		}
		else
		{
    		url = 'cart/update/'+id+'/'+qtd;
    		$.get(url,function(){
    				window.location="cart";
    		});
		}
		
	});
	
});
</script>
@stop