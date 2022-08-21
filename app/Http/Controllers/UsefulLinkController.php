<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UsefulCategory;
use App\UsefulLink;
use Illuminate\Support\Facades\View;

class UsefulLinkController extends Controller {
    
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
        $count = UsefulLink::count();
        $usefulCategories = UsefulCategory::where('active', 1)->get();
        $usefulLinks = UsefulLink::orderBy('id', 'desc')->paginate(10);
        return view('Admin.UsefulLink.index', compact('usefulLinks', 'count', 'usefulCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $usefulCategories = UsefulCategory::where('active', 1)->get();
        return view('Admin.UsefulLink.create', compact('usefulCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        dd($request->file());
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $requestData = $request->all();
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        if (isset($requestData['link'])) {
            $requestData['link'] = trim($requestData['link']);
        }
        
        $requestData['english_name'] = trim($requestData['english_name']);
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        UsefulLink::create($requestData);
        return redirect('/usefulLink');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $course = UsefulLink::findOrFail($id);
        return view('Admin.UsefulLink.show', compact('course'));
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
//dd($request->all());
        //        dd($request->file('image'));
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $this->validate($request, [
            'arabic_name' => 'required|max:255',
            'english_name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
         if (isset($requestData['link'])) {
            $requestData['link'] = trim($requestData['link']);
        }
        $requestData['english_name'] = trim($requestData['english_name']);
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        UsefulLink::where('id', $id)->update($requestData);
        return redirect('/usefulLink');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $usefulLink = UsefulLink::findOrFail($id);
        $result = $usefulLink->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function UsefulLinkSearch(Request $request) {
//        $count = null;
//        $usefulLinks = array();
        $basic_items = new \Illuminate\Database\Eloquent\Collection;
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        $useful_related_categories = array();
        if ($valueToSearch != '') {
            $basic_items = UsefulLink::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->orWhere('link', 'like', "%$valueToSearch%")->get();
        }
        $usefulcategories = UsefulCategory::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        if (count($usefulcategories) > 0) {
            foreach ($usefulcategories as $useful_category) {
                $useful_related_categories[] = UsefulLink::Where('useful_category_id', $useful_category->id)->get();
            }
        }
        if ($useful_related_categories != null) {
            foreach ($useful_related_categories as $collection) {
                foreach ($collection as $c) {
                    $basic_items->push($c);
                }
            }
        }
        $usefulLinks = $basic_items->unique();
        if (empty($usefulLinks)) {
            $flag = 1;
        }
        $usefulCategories = UsefulCategory::where('active', 1)->get();
        $view = View::make('Admin.UsefulLink.search')->with('usefulLinks', $usefulLinks)->with('usefulCategories', $usefulCategories)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
