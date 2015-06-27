@extends('store.store')

@section('content')
   
<div class="col-sm-9 padding-right">
    
    <h3>Meus Pedidos</h3>
    
    <table class="table">
    	<tbody>
    		<tr>
    			<th>ID</th>
    			<th>Itens</th>
    			<th>Valor</th>
    			<th>Status</th>
    		</tr>
    	</tbody>
    	@foreach($orders as $order)
    	<tr>
    		<td>{{ $order->id }}</td>
    		<td>
		       <ul>
		          @foreach($order->items as $item)
		              <li> {{ $item->product->name }} </li>
		          @endforeach
		       </ul>
    		</td>
    		<td>{{ $order->total }}</td>
    		<td>
    		  @if ( $order->status == 0)
                Pedido Realizado
              @elseif ( $order->status == 1)
                Pagamento Autorizado
              @elseif ( $order->status == 2)
                Emissão de Nota Fiscal
              @elseif ( $order->status == 3)
                Produto em Transporte
              @elseif ( $order->status == 4)
                Produto Entregue     
              @elseif ( $order->status == 5)
                Cancelado          
              @endif
    		</td>
    	</tr>
    	@endforeach
    </table>

</div>
    
@stop