<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerReviewRequest;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\View;


class CustomerReviewController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = CustomerReview::count();
        $customerReviews = CustomerReview::orderBy('id', 'desc')->paginate(10);
        return view('Admin.CustomerReview.index', compact('customerReviews', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.CustomerReview.create');
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
            'arabic_review' => 'required',
            'english_review' => 'required',
        ]);
        if (isset($requestData['arabic_review'])) {
            $requestData['arabic_review'] = trim($requestData['arabic_review']);
        }
        if (isset($requestData['english_review'])) {
           $requestData['english_review'] = trim($requestData['english_review']);
        }

        CustomerReview::create($requestData);
        return redirect('/customerReview');
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
            'arabic_review' => 'required',
            'english_review' => 'required',
        ]);
         if (isset($requestData['arabic_review'])) {
            $requestData['arabic_review'] = trim($requestData['arabic_review']);
        }
        if (isset($requestData['english_review'])) {
           $requestData['english_review'] = trim($requestData['english_review']);
        }
        CustomerReview::where('id', $id)->update($requestData);
        return redirect('/customerReview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $customer_review = CustomerReview::findOrFail($id);
        $result = $customer_review->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function customerReviewSearch(Request $request) {
        $customerReviews = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $customerReviews = CustomerReview::where('arabic_review', 'like', "%$valueToSearch%")->orWhere('english_review', 'like', "%$valueToSearch%")->get();
        }
        if (empty($customerReviews)) {
            $flag = 1;
        }
        $view = View::make('Admin.CustomerReview.search')->with('customerReviews', $customerReviews)->render();
//        dd($view);
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
