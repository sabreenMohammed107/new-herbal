<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contact;

use Illuminate\Support\Facades\View;

use App\ContactValue;

class ContactController extends Controller
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
        $count = Contact::count();
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        return view('Admin.Contact.index', compact('contacts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.Contact.create');
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
        Contact::create($requestData);
        return redirect('/contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $contact = Contact::findOrFail($id);
        return view('Admin.Contact.show', compact('contact'));
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
        Contact::where('id', $id)->update($requestData);
        return redirect('/contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->input('id');
        $about = Contact::findOrFail($id);
        $result = $about->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }

    public function contactSearch(Request $request) {
        $contacts = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $contacts = Contact::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        }
        if (empty($contacts)) {
            $flag = 1;
        }
        $view = View::make('Admin.Contact.search')->with('contacts', $contacts)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }
    
    public function assignContactValue($id) {
        $contact = Contact::findOrFail($id);
        return view('Admin.Contact.ContactValueCreate', compact('contact'));
    }
    
    public function contactValues() {
        $random = rand();
        return view('Admin.Contact.ContactValues', compact('random'));
    }


    public function assignContactValueStore(Request $request) {
        $arabic_value = array();
        $english_value = array();
        if (null !== $request->get('arabic_value') && count($request->get('arabic_value')) > 0) {
            $arabic_value  = $request->get('arabic_value');
        }
        if (null !== $request->get('english_value') && count($request->get('english_value')) > 0) {
             $english_value  = $request->get('english_value');
        }
        $contact = Contact::findOrFail($request->get('contact'));
        foreach ($english_value as $key => $value) {
            $contact_value = new ContactValue(['english_value' => trim($value) ,'arabic_value'=>trim($arabic_value[$key]),'active'=>1]);
            $contact->contactValues()->save($contact_value);
        }
        return redirect()->action(
                        'ContactController@show', ['contact_id' => $request->get('contact')]
        );
    }

    public function assignContactValueUpdate(Request $request) {
        $requestData = $request->except('_method', '_token');
        if ($request->get('active') == "on") {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }
        ContactValue::where('id', $request->get('id'))->update($requestData);
        $contact_value =  ContactValue::findOrFail($request->get('id'));
        return redirect()->action(
                        'ContactController@show', ['contact_id' => $contact_value->contact_id]
        );
    }

    
    public function contactValueDelete(Request $request) {
        $id = $request->input('id');
        $contact_value = ContactValue::findOrFail($id);
        $result = $contact_value->delete();
        if ($result) {
            return response()->json(['sucess' => "Sucees to Delete", 'id' => $id]);
        }
    }
}
