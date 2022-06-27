<?php

namespace App\Http\Controllers;
use Session;
use App\Type;
use App\Division;
use App\Zone;
use App\Area;
use App\Attachment;
use Carbon\Carbon;
use App\DivisionalIncharge;
use Illuminate\Http\Request;

class DivisionalInchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisional_incharges = DivisionalIncharge::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.divisional_incharge.index', compact('divisional_incharges'));

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
        return view('admin.divisional_incharge.create', compact(['types','divisions','zones','areas']));

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
        $divisionalIncharge = DivisionalIncharge::create([
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
            $divisionalIncharge->image = '/storage/customer/' . $image_new_name;
            $divisionalIncharge->save();
        }
        Session::flash('success', 'Divisional Incharge Profile created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DivisionalIncharge  $divisionalIncharge
     * @return \Illuminate\Http\Response
     */
    public function show(DivisionalIncharge $divisionalIncharge)
    {
        return view('admin.divisional_incharge.show', compact('divisionalIncharge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DivisionalIncharge  $divisionalIncharge
     * @return \Illuminate\Http\Response
     */
    public function edit(DivisionalIncharge $divisionalIncharge)
    {
        $divisions = Division::all();
        $zones = Zone::all();
        $areas = Area::all();
        $types = Type::all();
        return view('admin.divisional_incharge.edit', compact(['divisionalIncharge', 'types','divisions','zones','areas']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DivisionalIncharge  $divisionalIncharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DivisionalIncharge $divisionalIncharge)
    {
        //dd($request->all());
        $this->validate($request, [

            'name' => 'required',
            'shop_name' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
        ]);
        $divisionalIncharge = DivisionalIncharge::create([
            $divisionalIncharge-> name = $request->name,
            $divisionalIncharge-> nickname = $request->nickname,
            $divisionalIncharge-> phone = $request->phone,
            $divisionalIncharge-> email = $request->email,
            $divisionalIncharge-> present_address = $request->present_address,
            $divisionalIncharge-> permanent_address = $request->permanent_address,
            $divisionalIncharge-> religion = $request->religion,
            $divisionalIncharge-> type_id = $request->type,
            $divisionalIncharge-> image = $request->image,
            $divisionalIncharge-> shop_name = $request->shop_name,
            $divisionalIncharge-> shop_image = $request->shop_image,
            $divisionalIncharge-> nid_number = $request->nid_number,
            $divisionalIncharge-> nid_image = $request->nid_image,
            $divisionalIncharge-> birthdate = $request->birthdate,
            $divisionalIncharge-> marriage_dob = $request->marriage_dob,
            $divisionalIncharge-> family_member = $request->family_member,
            $divisionalIncharge-> father_name = $request->father_name,
            $divisionalIncharge-> mother_name = $request->mother_name,
            $divisionalIncharge-> occupation = $request->occupation,
            $divisionalIncharge-> business_year = $request->business_year,
            $divisionalIncharge-> number_of_children = $request->number_of_children,
            $divisionalIncharge-> children_dob = $request->children_dob,
            $divisionalIncharge-> division_id = $request->division,
            $divisionalIncharge-> zone_id =$request->zone,
            $divisionalIncharge-> area_id = $request->area,
        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' .$image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $divisionalIncharge->image = '/storage/customer/' . $image_new_name;
            $divisionalIncharge->save();
        }
        Session::flash('success', 'Divisional Incharge Profile  created successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DivisionalIncharge  $divisionalIncharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(DivisionalIncharge $divisionalIncharge)
    {
        if($divisionalIncharge){
            if(file_exists(public_path($divisionalIncharge->image))){
                unlink(public_path($divisionalIncharge->image));
            }

            $divisionalIncharge->delete();
            Session::flash('Divisional Incharge Profile deleted successfully');
        }
        return redirect()->back();
    }
}
