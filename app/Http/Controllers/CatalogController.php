<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use DataTables;
  
class CatalogController extends Controller
{
    
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $catalog = Product::select('*');
            return datatables()->of($catalog)
                ->make(true);
        }
          
        return view('admin/catalog', ['tittle' => '| | Catalog']);
    }
}