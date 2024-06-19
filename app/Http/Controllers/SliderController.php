<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;

use App\Models\Slider;

use DataTables;

Use Response;
  
class SliderController extends Controller
{
    
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::select('*');
            return datatables()->of($sliders)
                ->addColumn('action', 'admin.slider-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
          
        return view('admin/sliderlist', ['tittle' => '| | List Slider']);
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $sliderId = $request->slider_id;
 
        $image = $request->hidden_image;
 
        if ($files = $request->file('image')) {
 
            //delete old file
            \File::delete('slider/' . $request->urlimg);
 
            //insert new file
            $destinationPath = 'slider/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $image = "$profileImage";
        }
 
        $slider = Slider::find($sliderId) ?? new Slider();
        // Set the individual attributes
        $slider->id = $sliderId;
        $slider->slug = $request->slug;
        $slider->author = $request->author;
        $slider->tittle = $request->tittle;
        $slider->des = $request->deskripsi;
        if($image != null){
            $slider->img = $image;
            $slider->imgtmb = $image;
        } else {
            $slider->img = $request->urlimg;
            $slider->imgtmb = $request->urlimg;
        }
 
        // Save the slider
        $slider->save();
 
        return Response::json($slider);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $slider  = Slider::where($where)->first();
 
        return Response::json($slider);
    }
 
    public function destroy($id)
    {
        $data = Slider::where('id', $id)->first(['img']);
        \File::delete('slider/' . $data->img);
        $slider = Slider::where('id', $id)->delete();
 
        return Response::json($slider);
    }
}