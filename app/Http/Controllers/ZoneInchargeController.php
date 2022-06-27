<?php

namespace App\Http\Controllers;
use Session;
use App\Type;
use App\Division;
use App\Zone;
use App\Area;
use App\Attachment;
use Carbon\Carbon;
use App\ZoneIncharge;
use Illuminate\Http\Request;

class ZoneInchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zone_incharges = ZoneIncharge::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.zone_incharge.index', compact('zone_incharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $divisions= Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::all();
        return view('admin.zone_incharge.create', compact(['types','divisions','zones','areas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'email' => 'required|unique:customers,email',
            'name' => 'required',
            'shop_name' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
        ]);
        $zoneIncharge = ZoneIncharge::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'image' => $request->image,
            'shop_name'=>$request->shop_name,
            'shop_image'=>$request->shop_image,
            'nid_number' => $request->nid_number,
            'nid_image' => $request->nid_image,
            'religion' => $request->religion,
            'birthdate' => $request->birthdate,
            'marriage_dob' => $request->marriage_dob,
            'family_member' => $request->family_member,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'occupation' => $request->occupation,
            'business_year' => $request->business_year,
            'number_of_children' => $request->number_of_children,
            'children_dob' => $request->children_dob,
            'division_id' => $request->division,
            'zone_id' => $request->zone,
            'area_id' => $request->area,
            'type_id' => $request->type,

        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $zoneIncharge->image = '/storage/customer/' . $image_new_name;
            $zoneIncharge->save();
        }
        Session::flash('success', 'Zone Incharge Profile created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ZoneIncharge  $zoneIncharge
     * @return \Illuminate\Http\Response
     */
    public function show(ZoneIncharge $zoneIncharge)
    {
        return view('admin.zone_incharge.show', compact('zoneIncharge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ZoneIncharge  $zoneIncharge
     * @return \Illuminate\Http\Response
     */
    public function edit(ZoneIncharge $zoneIncharge)
    {
        $divisions = Division::all();
        $zones = Zone::all();
        $areas = Area::all();
        $types = Type::all();
        return view('admin.zone_incharge.edit', compact(['zoneIncharge', 'types','divisions','zones','areas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ZoneIncharge  $zoneIncharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZoneIncharge $zoneIncharge)
    {

        //dd($request->all());
        $this->validate($request, [

            'name' => 'required',
            'shop_name' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
        ]);
        $zoneIncharge = ZoneIncharge::create([
            $zoneIncharge-> name = $request->name,
            $zoneIncharge-> nickname = $request->nickname,
            $zoneIncharge-> phone = $request->phone,
            $zoneIncharge-> email = $request->email,
            $zoneIncharge-> present_address = $request->present_address,
            $zoneIncharge-> permanent_address = $request->permanent_address,
            $zoneIncharge-> religion = $request->religion,
            $zoneIncharge-> type_id = $request->type,
            $zoneIncharge-> image = $request->image,
            $zoneIncharge-> shop_name = $request->shop_name,
            $zoneIncharge-> shop_image = $request->shop_image,
            $zoneIncharge-> nid_number = $request->nid_number,
            $zoneIncharge-> nid_image = $request->nid_image,
            $zoneIncharge-> birthdate = $request->birthdate,
            $zoneIncharge-> marriage_dob = $request->marriage_dob,
            $zoneIncharge-> family_member = $request->family_member,
            $zoneIncharge-> father_name = $request->father_name,
            $zoneIncharge-> mother_name = $request->mother_name,
            $zoneIncharge-> occupation = $request->occupation,
            $zoneIncharge-> business_year = $request->business_year,
            $zoneIncharge-> number_of_children = $request->number_of_children,
            $zoneIncharge-> children_dob = $request->children_dob,
            $zoneIncharge-> division_id = $request->division,
            $zoneIncharge-> zone_id =$request->zone,
            $zoneIncharge-> area_id = $request->area,
        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' .$image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $zoneIncharge->image = '/storage/customer/' . $image_new_name;
            $zoneIncharge->save();
        }
        Session::flash('success', 'Zone Incharge Profile  created successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ZoneIncharge  $zoneIncharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZoneIncharge $zoneIncharge)
    {
        if($zoneIncharge){
            if(file_exists(public_path($zoneIncharge->image))){
                unlink(public_path($zoneIncharge->image));
            }

            $zoneIncharge->delete();
            Session::flash('Zone Incharge Profile deleted successfully');
        }
        return redirect()->back();
    }
}
