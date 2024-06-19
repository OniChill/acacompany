<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Diskon;
use App\Models\product;

class HomeController extends Controller
{
    public function index(){
        return view('admin/dashboard', ['tittle' => '| | Dashboard']);
    }

    public function home(){
        return view('home', ['tittle' => '| | Home','sliders'=>Slider::all(),'diskons'=>Diskon::all(),'catalogs'=>Product::all()]);
    }
}
