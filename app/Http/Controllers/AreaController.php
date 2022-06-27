<?php

namespace App\Http\Controllers;
use Session;
use App\Division;
use App\Zone;
use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.area.index', compact('areas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions= Division::with(['zones'])->get();
        return view('admin.area.create', compact(['divisions']));
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
            'name' => 'required'
        ]);

        $area = Area::create([
            'name' => $request->name,
            'division_id' => $request->division,
            'zone_id' => $request->zone,
        ]);

        Session::flash('success', 'Area created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $divisions= Division::all();
        $zones= Zone::all();
        return view('admin.area.edit', compact('area','divisions','zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        // validation
        $this->validate($request, [
            'name' => "required",
        ]);
        $area->name = $request->name;
        $area-> division_id = $request->division;
        $area-> zone_id = $request->zone;
        $area->save();

        Session::flash('success', 'Area updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        if($area){
            $area->delete();

            Session::flash('success', 'Area deleted successfully');
            return redirect()->route('area.index');
        }
    }
}
