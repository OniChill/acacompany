<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

use App\Repositories\Front\Interfaces\ProductRepositoryInterface;
use App\Repositories\Front\Interfaces\CategoryRepositoryInterface;

class ShopController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();

        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

        $this->data['categories'] = $this->categoryRepository->findAll();
        
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $options = [
            'per_page' => $this->perPage,
        ];
        
        $this->data['catalogs'] = $this->productRepository->findAll($options);
        
        return view('shop', $this->data, ['tittle' => '| | Catalog']);
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        //return view('posts.show', compact('post'));
        $data['product'] = $product;
        return view('detailproduct', $data, ['tittle' => '| | Detail']);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function category($categorySlug)
    {
        $category = $this->categoryRepository->findBySlug($categorySlug);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'category' => $categorySlug,
            ]
        ];

        $this->data['catalogs'] = $this->productRepository->findAll($options);
        $this->data['category'] = $category;

        return view('Category', $this->data, ['tittle' => '| | Category']);

    }


}
