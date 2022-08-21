<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ProductCategory;
use App\Product;
use Illuminate\Support\Facades\View;
use App\ProductSheet;
use App\ProductImage;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $product_categories = ProductCategory::where('active', 1)->get();
        $count = Product::count();
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('Admin.Product.index', compact('product_categories', 'count', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $product_categories = ProductCategory::where('active', 1)->get();
        return view('Admin.Product.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255'
        ]);
        $requestData = $request->all();
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Product', $name);
            $requestData['image'] = $name;
        }
        if ($file = $request->file('video')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Product', $name);
            $requestData['video'] = $name;
        }
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] = trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] = trim($requestData['english_desc']);
        }
        if (isset($requestData['arabic_overview'])) {
            $requestData['arabic_overview'] = trim($requestData['arabic_overview']);
        }
        if (isset($requestData['english_overview'])) {
            $requestData['english_overview'] = trim($requestData['english_overview']);
        }
        Product::create($requestData);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('Admin.Product.show', compact('product'));
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
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Product', $name);
            $requestData['image'] = $name;
        }
        if ($file = $request->file('video')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Product', $name);
            $requestData['video'] = $name;
        }
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] = trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] = trim($requestData['english_desc']);
        }
        if (isset($requestData['arabic_overview'])) {
            $requestData['arabic_overview'] = trim($requestData['arabic_overview']);
        }
        if (isset($requestData['english_overview'])) {
            $requestData['english_overview'] = trim($requestData['english_overview']);
        }
        Product::where('id', $id)->update($requestData);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $product = Product::findOrFail($id);
        $result = $product->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function productSearch(Request $request) {
        $products = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $products = Product::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        }
        if (empty($products)) {
            $flag = 1;
        }
        $product_categories = ProductCategory::where('active', 1)->get();
        $view = View::make('Admin.Product.search')->with('products', $products)->with('product_categories', $product_categories)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

    public function assignProductSheet($id) {
        $product = Product::findOrFail($id);
        return view('Admin.Product.ProductSheetCreate', compact('product'));
    }

    public function productSheets() {
        $random = rand();
        return view('Admin.Product.productSheets', compact('random'));
    }

    public function assignProductSheetStore(Request $request) { {
            $arabic_value = array();
            $english_value = array();
            $arabic_name = array();
            $english_name = array();
            if (null !== $request->get('arabic_value') && count($request->get('arabic_value')) > 0) {
                $arabic_value = $request->get('arabic_value');
            }
            if (null !== $request->get('english_value') && count($request->get('english_value')) > 0) {
                $english_value = $request->get('english_value');
            }
            if (null !== $request->get('arabic_name') && count($request->get('arabic_name')) > 0) {
                $arabic_name = $request->get('arabic_name');
            }
            if (null !== $request->get('english_name') && count($request->get('english_name')) > 0) {
                $english_name = $request->get('english_name');
            }
            $product = Product::findOrFail($request->get('product'));
            foreach ($english_value as $key => $value) {
                $product_sheet = new ProductSheet(['arabic_name' => trim($arabic_name[$key]), 'english_name' => trim($english_name[$key]), 'english_value' => trim($value), 'arabic_value' => trim($arabic_value[$key]), 'active' => 1]);
                $product->productSheets()->save($product_sheet);
            }
            return redirect()->action(
                            'ProductController@show', ['product_id' => $request->get('product')]
            );
        }
    }

    public function assignProductSheetUpdate(Request $request) {
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        if (isset($requestData['arabic_name'])) {
            $requestData['arabic_name'] = trim($requestData['arabic_name']);
        }
        if (isset($requestData['english_name'])) {
            $requestData['english_name'] = trim($requestData['english_name']);
        }
        if (isset($requestData['arabic_value'])) {
            $requestData['arabic_value'] = trim($requestData['arabic_value']);
        }
        if (isset($requestData['english_value'])) {
            $requestData['english_value'] = trim($requestData['english_value']);
        }
        ProductSheet::where('id', $request->get('id'))->update($requestData);
        $product_sheet = ProductSheet::findOrFail($request->get('id'));
        return redirect()->action(
                        'ProductController@show', ['product_id' => $product_sheet->product_id]
        );
    }

    public function productSheetsDelete(Request $request) {
        $id = $request->input('id');
        $product_sheet = ProductSheet::findOrFail($id);
        $result = $product_sheet->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function assignProductImage($id) {
        $product = Product::findOrFail($id);
        return view('Admin.Product.ProductImageCreate', compact('product'));
    }

    public function assignProductImageStore(Request $request) {
        $requestData = $request->all();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images/Product', $name);
                ProductImage::create(['image' => $name, 'product_id' => $requestData['product']]);
            }
        }
        return redirect()->action(
                        'ProductController@show', ['product_id' => $requestData['product']]
        );
    }

    public function productImageDelete(Request $request) {
        $id = $request->input('id');
        $product_image = ProductImage::findOrFail($id);
        $result = $product_image->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

}
