<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    // Show all Requests
    public function index() {
        return view('requests.index',[
            'requests' => Request::latest()->filter(request(['status', 'search']))->paginate(4)
        ]);
    }

    // Show single request
    public function show(Request $request) {
        return view('requests.show', [
            'request' => $request
        ]);
    }

    // Show Create Form
    public function create() {
        return view('requests.create');
    }

    // Store Request Data
    public function store(HttpRequest $httprequest){
        $formFields = $httprequest->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'comment' => 'required'
        ]);
        $formFields['status'] = 'pending';

        $formFields['user_id'] = auth()->id();
        Request::create($formFields);

        return redirect('/')->with('message','Request created succesfully!');
    }

    // Show edit form
    public function edit(Request $request){
        return view('requests.edit',['request' => $request]);
    }

    // Show approve form
    public function approve(Request $request){
        return view('requests.approve',['request' => $request]);
    }

    // Update Request Data
    public function update(HttpRequest $httprequest, Request $request){

        //Make sure logged in user is owner
        if($request->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $httprequest->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'comment' => 'required'
        ]);
        $request->update($formFields);

        return redirect('/')->with('message','Request updated succesfully!');
    }

    // Review request
    public function updateStatus(HttpRequest $httprequest, Request $request){

        //Make sure logged in user is manager
        if(auth()->user()->role != "manager"){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $httprequest->validate([
            'status' => 'required'
        ]);
        $request->update($formFields);

        return redirect('/')->with('message','Request reviewed succesfully!');
    }

    // Delete request
    public function destroy(Request $request) {
        
        //Make sure logged in user is owner
        if($request->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $request->delete();

        return redirect('/')->with('message','Request deleted succesfully!');
    }

    // Manage requests
    public function manage() {
        return view('requests.manage', ['requests' => auth()->user()->requests()->get()]);
    }

}
