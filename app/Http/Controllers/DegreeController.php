<?php

namespace App\Http\Controllers;
use Session;
use App\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.degree.index', compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|unique:degrees,name',
        ]);

        $degree = Degree::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Session::flash('success', 'Customer degree created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $degree)
    {
        return view('admin.degree.edit', compact('degree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Degree $degree)
    {

        // validation
        $this->validate($request, [
            'name' => "required|unique:degrees,name,$degree->id",
        ]);

        $degree->name = $request->name;
        $degree->description = $request->description;
        $degree->save();

        Session::flash('success', 'Customer degree updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        if($degree){
            $degree->delete();

            Session::flash('success', 'Customer Degree deleted successfully');
            return redirect()->route('degree.index');
        }
    }
}
