<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Onkir;

use App\Repositories\Front\Interfaces\CartRepositoryInterface;
use App\Repositories\Front\Interfaces\ProductRepositoryInterface;

class CheckoutController extends Controller
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(CartRepositoryInterface $cartRepository, ProductRepositoryInterface $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(){
        $cart = $this->cartRepository->findByUser(auth()->user());
        $this->data['cart'] = $cart;
        $onkir = Onkir::all();
        $this->data['onkir'] = $onkir;
        return view('checkout', $this->data, ['tittle' => '| | Checkout']);
    }
    public function getOnkir($id)
    {
        
        $onkir = Onkir::where('negara', $id)->get();
        echo json_encode($onkir);
        
    }
}
