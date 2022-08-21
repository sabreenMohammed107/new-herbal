<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\News;
use App\NewsPoint;

class NewSController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = News::count();
        $news = News::orderBy('id', 'desc')->paginate(10);
        return view('Admin.News.index', compact('news', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.News.create');
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
            'english_name' => 'required|max:255',
        ]);
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('public/images/News', $name);
            $requestData['image'] = $name;
        }
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] = trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] = trim($requestData['english_desc']);
        }
        News::create($requestData);
        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $new = News::findOrFail($id);
        return view('Admin.News.show', compact('new'));
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
//        dd($request->all());
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
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('public/images/News', $name);
            $requestData['image'] = $name;
        }
        $requestData['arabic_name'] = trim($requestData['arabic_name']);
        $requestData['english_name'] = trim($requestData['english_name']);
        if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] = trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] = trim($requestData['english_desc']);
        }
        News::where('id', $id)->update($requestData);
        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $about = News::findOrFail($id);
        $result = $about->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function newsSearch(Request $request) {
        $news = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $news = News::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->orWhere('arabic_desc', 'like', "%$valueToSearch%")->orWhere('english_desc', 'like', "%$valueToSearch%")->get();
        }
        if (empty($news)) {
            $flag = 1;
        }
        $view = View::make('Admin.News.search')->with('news', $news)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

    public function assignNewsPoint($id) {
        $new = News::findOrFail($id);
        return view('Admin.News.NewsPointCreate', compact('new'));
    }

    public function newsValues() {
        $random = rand();
        return view('Admin.News.NewsPoints', compact('random'));
    }

    public function assignNewsPointStore(Request $request) {
        $arabic_value = array();
        $english_value = array();
        if (null !== $request->get('arabic_value') && count($request->get('arabic_value')) > 0) {
            $arabic_value = $request->get('arabic_value');
        }
        if (null !== $request->get('english_value') && count($request->get('english_value')) > 0) {
            $english_value = $request->get('english_value');
        }
        $news = News::findOrFail($request->get('new'));
        foreach ($english_value as $key => $value) {
            $news_value = new NewsPoint(['english_value' => trim($value), 'arabic_value' => trim($arabic_value[$key]), 'active' => 1]);
            $news->newsPoints()->save($news_value);
        }
        return redirect()->action(
                        'NewsController@show', ['news_id' => $request->get('new')]
        );
    }

    public function assignNewsPointsUpdate(Request $request) {
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $requestData['arabic_value'] = trim($requestData['arabic_value']);
        $requestData['english_value'] = trim($requestData['english_value']);
        NewsPoint::where('id', $request->get('id'))->update($requestData);
        $news_point = NewsPoint::findOrFail($request->get('id'));
        return redirect()->action(
                        'NewsController@show', ['news_id' => $news_point->news_id]
        );
    }

    public function newsPointsDelete(Request $request) {
        $id = $request->input('id');
        $news_point = NewsPoint::findOrFail($id);
        $result = $news_point->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

}
