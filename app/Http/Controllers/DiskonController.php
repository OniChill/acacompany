<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Diskon;

use DataTables;
  
class DiskonController extends Controller
{
    
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $diskons = Diskon::select('*');
            return datatables()->of($diskons)
                ->make(true);
        }
          
        return view('admin/diskonlist', ['tittle' => '| | List Promo']);
    }
}