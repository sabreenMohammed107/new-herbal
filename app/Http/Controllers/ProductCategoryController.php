<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ProductCategory;
use Illuminate\Support\Facades\View;

class ProductCategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = ProductCategory::count();
        $productCategories = ProductCategory::orderBy('id', 'desc')->paginate(10);
        return view('Admin.ProductCategory.index', compact('productCategories', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.ProductCategory.create');
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
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('public/images/ProductCategory', $name);
            $requestData['image'] = $name;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
        ]);
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        ProductCategory::create($requestData);
        return redirect('/productCategory');
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
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('public/images/ProductCategory', $name);
            $requestData['image'] = $name;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
        ]);
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        ProductCategory::where('id', $id)->update($requestData);
        return redirect('/productCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $about = ProductCategory::findOrFail($id);
        $result = $about->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function productCategorySearch(Request $request) {
        $productCategories = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $productCategories = ProductCategory::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        }
        if (empty($productCategories)) {
            $flag = 1;
        }
        $view = View::make('Admin.ProductCategory.search')->with('productCategories', $productCategories)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
