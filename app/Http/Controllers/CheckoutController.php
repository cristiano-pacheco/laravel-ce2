<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Events\CheckoutEvent;

class CheckoutController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
	public function place(Order $orderModel, OrderItem $orderItem)
	{
	    if(!Session::has('cart')){
	        return false;
	    }
	    
	    $cart = Session::get('cart');
	    
	    if($cart->getTotal() > 0){
	        
	       $order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]);
	       
	       foreach ($cart->all() as $k => $item){
	           
	           $order->items()->create(['product_id'=>$k,'price'=>$item['price'],'qtd'=>$item['qtd']]);
	       }
	       
	       $cart->clear();
	       
	       event(new CheckoutEvent());
	       
	       return view('store.checkout',compact('order'));

	    }else{
	        echo '<script>alert("adicione produtos ao carrinho de compras");</script>';
            echo '<script>window.location = "/cart";</script>';
	    }
	}

}
