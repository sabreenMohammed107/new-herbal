<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SliderImage;

class SliderImageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = SliderImage::count();
        $sliderImages = SliderImage::orderBy('id', 'desc')->paginate(10);
        return view('Admin.SliderImage.index', compact('sliderImages', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.SliderImage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $requestData = $request->all();
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('public/images/SliderImage', $name);
                SliderImage::create(['image' => $name, 'active' => $requestData['active']]);
            }
        }
        return redirect('sliderImage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

    }

    public function update(Request $request, $id) {

        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }


        SliderImage::where('id', $id)->update($requestData);
        return redirect('/sliderImage');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        $id = $request->input('id');
        $slider_image = sliderImage::findOrFail($id);
        $result = $slider_image->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

}
