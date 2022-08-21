<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AboutAchievement;
use Illuminate\Support\Facades\View;

class AboutAchievementController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = AboutAchievement::count();
        $aboutAchievements = AboutAchievement::orderBy('id', 'desc')->paginate(10);
        return view('Admin.AboutAchievement.index', compact('aboutAchievements', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Admin.AboutAchievement.create');
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

        $this->validate($request, [
            'year' => 'required|max:255',
            'arabic_achievement' => 'required',
            'english_achievement' => 'required',
        ]);
        if (isset($requestData['year'])) {
            $requestData['year'] = trim($requestData['year']);
        }
        if (isset($requestData['arabic_achievement'])) {
            $requestData['arabic_achievement'] = trim($requestData['arabic_achievement']);
        }
        if (isset($requestData['english_achievement'])) {
            $requestData['english_achievement'] = trim($requestData['english_achievement']);
        }
        $aboutAchievement = AboutAchievement::create($requestData);
        if ($requestData['active'] == 1) {
            AboutAchievement::where('id', '!=', $aboutAchievement->id)->update(['active' => 0]);
        }

        return redirect('/aboutAchievement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $aboutAchievement = AboutAchievement::findOrFail($id);
        return view('Admin.AboutAchievement.show', compact('aboutAchievement'));
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
        //        dd($request->file('image'));
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        $this->validate($request, [
            'year' => 'required|max:255',
            'arabic_achievement' => 'required',
            'english_achievement' => 'required',
        ]);
        if (isset($requestData['year'])) {
            $requestData['year'] = trim($requestData['year']);
        }
        if (isset($requestData['arabic_achievement'])) {
            $requestData['arabic_achievement'] = trim($requestData['arabic_achievement']);
        }
        if (isset($requestData['english_achievement'])) {
            $requestData['english_achievement'] = trim($requestData['english_achievement']);
        }
        AboutAchievement::where('id', $id)->update($requestData);
        if ($requestData['active'] == 1) {
            AboutAchievement::where('id', '!=', $id)->update(['active' => 0]);
        }
        return redirect('/aboutAchievement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $aboutAchievement = AboutAchievement::findOrFail($id);
        $result = $aboutAchievement->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function aboutAchievementSearch(Request $request) {
        $aboutAchievements = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $aboutAchievements = AboutAchievement::where('year', 'like', "%$valueToSearch%")->orWhere('arabic_achievement', 'like', "%$valueToSearch%")->orWhere('english_achievement', 'like', "%$valueToSearch%")->get();
        }
        if (empty($aboutAchievements)) {
            $flag = 1;
        }
        $view = View::make('Admin.AboutAchievement.search')->with('aboutAchievements', $aboutAchievements)->render();
//        dd($view);
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
