<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\GalleryType;
use Illuminate\Support\Facades\View;

class GalleryTypeController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = GalleryType::count();
        $gallery_types = GalleryType::orderBy('id', 'desc')->paginate(10);
        return view('Admin.GalleryType.index', compact('gallery_types', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Admin.GalleryType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $requestData = $request->all();
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
        ]);
        GalleryType::create($requestData);
        return redirect('/galleryType');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
        ]);
        GalleryType::where('id', $id)->update($requestData);
        return redirect('/galleryType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $galleryType = GalleryType::findOrFail($id);
        $result = $galleryType->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function galleryTypeSearch(Request $request) {
        $count = null;
        $gallery_types = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $gallery_types = GalleryType::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        }
        if (empty($gallery_types)) {
            $flag = 1;
        }
        $view = View::make('Admin.GalleryType.search')->with('gallery_types', $gallery_types)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
