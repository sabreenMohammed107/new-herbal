
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Certification;

use Illuminate\Support\Facades\View;

class CertificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $count = Certification::count();
        $certifications = Certification::orderBy('id', 'desc')->paginate(10);
        return view('Admin.Certification.index', compact('certifications', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
+
     *      * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Admin.Certification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
//        dd($request->all());
        $this->validate($request, [
           'name' => 'required|max:255'
        ]);
        $requestData = $request->all();
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Certification', $name);
             $requestData['image'] = $name;
        }
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] =trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] =trim( $requestData['english_desc']);
        }
        
        
        Certification::create($requestData);
        return redirect('/certifcate');
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
        //
        $requestData = $request->except('_method', '_token');
         $this->validate($request, [
           'name' => 'required|max:255'
        ]);

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images/Certification', $name);
             $requestData['image'] = $name;
        }
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
       if (isset($requestData['arabic_desc'])) {
            $requestData['arabic_desc'] =trim($requestData['arabic_desc']);
        }
        if (isset($requestData['english_desc'])) {
            $requestData['english_desc'] =trim( $requestData['english_desc']);
        }
        
        Certification::where('id', $id)->update($requestData);
        return redirect('/certifcate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $sucess_story = Certification::findOrFail($id);
        $result = $sucess_story->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }
    
    public function certificationSearch(Request $request) {
//        $count = null;
        $certifications  = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $certifications  = Certification::where('name', 'like', "%$valueToSearch%")->orWhere('number', 'like', "%$valueToSearch%")->orWhere('arabic_desc', 'like', "%$valueToSearch%")->orWhere('english_desc', 'like', "%$valueToSearch%")->get();
        }
        if (empty($certifications)) {
            $flag = 1;
        }
        $view = View::make('Admin.Certification.search')->with('certifications', $certifications)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

}
