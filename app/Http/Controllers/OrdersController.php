<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class OrdersController extends Controller
{
    private $model;
    
    public function __construct(Order $order)
    {
        $this->model = $order;
    }
    
    public function index()
    {
        $orders = $this->model->where('id','>=',1)->orderBy('status')->orderBy('created_at')->paginate(30);
        return view('orders.index',compact('orders'));
    }
    
    public function edit($id) 
    {
        $status = [
          0 => 'Pedito Realizado',
          1 => 'Pagamento Autorizado',
          2 => 'Emissão de Nota Fiscal',
          3 => 'Produto em Transporte',
          4 => 'Produto Entregue',
          5 => 'Cancelado',
        ];
        
        $order = $this->model->find($id);

        return view('orders.edit',compact('status','order'));    
    }
    
    public function update(Request $request, $id)
    {
        $this->model->find($id)->update($request->all());
	    return redirect()->route('orders');
    }
    
}