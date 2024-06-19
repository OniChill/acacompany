<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;

use App\Models\Transaksi;

use DataTables;
  
class TransaksiController extends Controller
{
    
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $transaksi = Transaksi::select('*');
            return datatables()->of($transaksi)
                ->make(true);
        }
          
        return view('admin/transaksi', ['tittle' => '| | Transaksi']);
    }
}