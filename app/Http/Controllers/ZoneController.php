<?php

namespace App\Http\Controllers;
use Session;
use App\Division;
use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions= Division::all();
        //dd($divisions);
        return view('admin.zone.create', compact(['divisions']));
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

        $zone= Zone::create([
            'name' => $request->name,
            'division_id' => $request->division,
        ]);

        Session::flash('success', 'Division created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $divisions= Division::all();
        return view('admin.zone.edit', compact('zone','divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        // validation
        $this->validate($request, [
            'name' => "required"
        ]);
        $zone->name = $request->name;
        $zone-> division_id = $request->division;
        $zone->save();

        Session::flash('success', 'Zone updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        if($zone){
            $zone->delete();

            Session::flash('success', 'Zone deleted successfully');
            return redirect()->route('zone.index');
        }
    }
}
