@extends('app')

@section('content')
<div class="container">

    <h1>Orders</h1>
    <br>
    <br>
   
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Valor Total</th>
            <th>Data</th>
            <th>Status</th>
            <th>Action</th>
        </tr> 
        @foreach($orders as $order)
        <tr> 
            <td>{{$order->id}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->created_at}}</td>
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
            <td>
                <a href="{{route('orders.edit',['id'=>$order->id])}}">Editar</a>
            </td>
        </tr>       
        @endforeach
    
    </table>
	
	{!! $orders->render() !!}
	
</div>
@endsection
