<?php

namespace App\Http\Controllers;

use App\Models\IskonReg;
use Illuminate\Http\Request;

use Rakibhstu\Banglanumber\NumberToBangla;

class IskonRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numto = new NumberToBangla();
        $iscons = IskonReg::get();
        return view('Backend.modules.iscon_registration.index',compact('iscons','numto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.modules.iscon_registration.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100|min:2|string',
            'phone'=>'required|max:100|min:2|string',
            'mondir_name'=>'required|max:100|min:2|string',
            'service'=>'required|max:100|min:2|string',
            'address'=>'required|max:100|min:2|string',
            'councillor'=>'required|max:100|min:2|string',
            'yesno'=>'required',
            'payment'=>'required',
            ],

            $message=[
                'name.required' => 'Please write a IskonReg name.',
                
            ]
        );


        
        IskonReg::create($request->all());
        session()->flash('msg','Submitted Successfully.');
        session()->flash('cls','success');
        return redirect()->route('iscon-reg.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IskonReg $iskonReg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $iskonReg = IskonReg::find($id);
        return view('Backend.modules.iscon_registration.edit',compact('iskonReg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|max:100|min:2|string',
            'phone'=>'required|max:100|min:2|string',
            'mondir_name'=>'required|max:100|min:2|string',
            'service'=>'required|max:100|min:2|string',
            'address'=>'required|max:100|min:2|string',
            'councillor'=>'required|max:100|min:2|string',
            'yesno'=>'required',
            'payment'=>'required',
            
            
            ],

            $message=[
                'name.required' => 'Please write your name.',                
            ]
        );

        $iskonReg = IskonReg::find($id);
        $iskonReg->update($request->all());
        session()->flash('msg','Updated Successfully.');
        session()->flash('cls','success');
        return redirect()->route('iscon-reg.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $iskonReg = IskonReg::find($id);
        $iskonReg->delete();
        session()->flash('msg','IskonReg Deleted Successfully.');
        session()->flash('cls','info');
        return redirect()->route('iscon-reg.index');
    }
}
