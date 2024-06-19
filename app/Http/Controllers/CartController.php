<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Front\Interfaces\CartRepositoryInterface;
use App\Repositories\Front\Interfaces\ProductRepositoryInterface;

use App\Models\Product;

class CartController extends Controller
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
    public function index()
    {
        $cart = $this->cartRepository->findByUser(auth()->user());
        $this->data['cart'] = $cart;
        return view('cart', $this->data,['tittle' => '| | Cart']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // $imageNamefront = date('YmdHis') . 'font' .time().'.'.$response['id'].'.'.$request->front->extension();
        // $imageNamerear = date('YmdHis') . 'rear' .time().'.'.$response['id'].'.'.$request->rear->extension();
        // $imageNameright = date('YmdHis') . 'right' .time().'.'.$response['id'].'.'.$request->right->extension();
        // $imageNameleft = date('YmdHis') . 'left' .time().'.'.$response['id'].'.'.$request->left->extension();
        // $request->front->move(public_path('custombike'), $imageNamefront);
        // $request->rear->move(public_path('custombike'), $imageNamerear);
        // $request->right->move(public_path('custombike'), $imageNameright);
        // $request->left->move(public_path('custombike'), $imageNameleft);
        // $payment->img1 = $imageNamefront;
        // $payment->img2 = $imageNamerear;
        // $payment->img3 = $imageNameright;
        // $payment->img4 = $imageNameleft;
        $color = $request->productColor;
        $productID = $request->get('product_id');
        $qty = $request->get('qty');
        
        $data['isiqty'] = $qty;
        $data['isicolor'] = $color;
        
        $product = $this->productRepository->findByID($productID);

        if ($product->stock_status != Product::STATUS_IN_STOCK) {
            return redirect(shop_product_link($product))->with('error', 'Tidak ada stok produk');
        }
       
        if ($product->stock < $qty) {
            return redirect(shop_product_link($product))->with('error', 'Stok produk tidak mencukupi');
        }

        $item = $this->cartRepository->addItem($product, $data);
        if (!$item) {
            return redirect(shop_product_link($product))->with('error', 'Tidak dapat menambahkan item ke keranjang');
        }

        return redirect(shop_product_link($product))->with('success', 'Berhasil menambahkan item ke keranjang');
    }

    public function custom(Request $request)
    {
        $color = $request->color;
        $productID = $request->get('product_id');
        $qty = $request->get('qty');

        $data['isiqty'] = $qty;
        $data['isicolor'] = $color;
        
        $product = $this->productRepository->findByID($productID);

        if ($product->stock_status != Product::STATUS_IN_STOCK) {
            return redirect()->route('customdesign')->with('error', 'Tidak ada stok produk');
        }
       
        if ($product->stock < $qty) {
            return redirect()->route('customdesign')->with('error', 'Stok produk tidak mencukupi');
        }

        $item = $this->cartRepository->addItem($product, $data);
        if (!$item) {
            return redirect()->route('customdesign')->with('error', 'Tidak dapat menambahkan item ke keranjang');
        }

        return redirect()->route('customdesign')->with('success', 'Berhasil menambahkan item ke keranjang');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $items = $request->get('qty');
        $this->cartRepository->updateQty($items);

        return redirect(route('cart.index'))->with('success', 'Keranjang telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->cartRepository->removeItem($id);

        return redirect(route('cart.index'))->with('success', 'Berhasil menghapus item dari keranjang');
    }
}