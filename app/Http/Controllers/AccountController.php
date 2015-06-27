<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        
    }
    
    public function orders()
    {
        $orders = \Auth::user()->orders;
        return view('store.orders',compact('orders'));
    }
}
