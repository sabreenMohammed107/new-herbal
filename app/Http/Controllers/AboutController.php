<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\About;
use Illuminate\Support\Facades\View;

class AboutController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = About::count();
        $abouts = About::orderBy('id', 'desc')->paginate(10);
        return view('Admin.About.index', compact('abouts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.About.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
//        dd("hhhh");
        $requestData = $request->all();
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'arabic_value' => 'required',
            'english_name' => 'required|max:255',
            'english_value' => 'required',
        ]);
        About::create($requestData);
        return redirect('/about');
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
            'arabic_value' => 'required',
            'english_name' => 'required|max:255',
            'english_value' => 'required',
        ]);
        About::where('id', $id)->update($requestData);
        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $about = About::findOrFail($id);
        $result = $about->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function aboutSearch(Request $request) {
        $abouts = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $abouts = About::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->orWhere('arabic_value', 'like', "%$valueToSearch%")->orWhere('english_value', 'like', "%$valueToSearch%")->get();
        }
        if (empty($abouts)) {
            $flag = 1;
        }
        $view = View::make('Admin.About.search')->with('abouts', $abouts)->render();
//        dd($view);
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
