<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\GalleryType;
use App\Gallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $arabic_names = array();
        $english_names = array();

        $count = DB::statement('SELECT  COUNT(*) FROM (select gallery_type_id from galleries group by gallery_type_id ) as n');
        $galleries = Gallery::select('gallery_type_id', 'created_at', 'id')
                ->groupBy('gallery_type_id')
                ->orderBy('id', 'desc')
                ->paginate(10);
        $gallery_types = GalleryType::all();
        foreach ($gallery_types as $gallery_type) {
            $gallery_types[$gallery_type->id] = GalleryType::where('id', $gallery_type->id)->first();
            $arabic_names[$gallery_type->id] = GalleryType::where('id', $gallery_type->id)->first()->arabic_name;
            $english_names[$gallery_type->id] = GalleryType::where('id', $gallery_type->id)->first()->english_name;
        }
        return view('Admin.Gallery.index', compact('count', 'galleries', 'arabic_names', 'english_names', 'gallery_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $gallery_types = GalleryType::where('active', 1)->get();
//        foreach ($gallery_types as $key =>$value)
//        {   
//            if(null !== Gallery::where('gallery_type_id',$value)->first())
//            {
//                $gallery_types->forget($key);
//            }
//        }
        return view('Admin.Gallery.create', compact('gallery_types'));
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
//        $this->validate($request, [
//            'image' => 'required|max:255',
//            'gallery_type_id' => 'required',
//        ]);
//        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
//                dd($name);
                $file->move('images/Gallery', $name);
                Gallery::create(['image' => $name, 'gallery_type_id' => $requestData['gallery_type_id'], 'active' => $requestData['active']]);
//                $images[] = $name;
            }
        }
        return redirect('gallery');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
//        dd($request->get('gallery'));
        $actives = array();
        if (null !== $request->get('actives') && count($request->get('actives')) > 0) {
            foreach ($request->get('actives') as $key => $active) {
                if ($active == "on") {
                    $actives[$key] = 1;
                }
            }
        }
        if (null !== $request->get('gallery') && count($request->get('gallery')) > 0) {
            foreach ($request->get('gallery') as $key => $value) {
                if (!isset($actives[$key])) {
                    $actives[$key] = 0;
                }
                Gallery::where('id', $key)->update(['active' => $actives[$key]]);
            }
        }
        return redirect('gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        $id = $request->input('id');
        $gallery = Gallery::findOrFail($id);
        $result = $gallery->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

}
