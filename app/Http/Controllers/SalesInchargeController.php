<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use status;
use Session;
use App\Division;
use App\Zone;
use App\Area;
use App\Employee;
use App\SalesIncharge;
use Illuminate\Http\Request;

class SalesInchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $sales_incharges = SalesIncharge::with('employee')->orderBy('created_at', 'DESC')->get();
        $sales_incharges = SalesIncharge::with('employee')->orderBy('created_at', 'DESC')->paginate(10);
       // dd($sales_incharges);
        return view('admin.sales_incharge.index', compact('sales_incharges'));
    }


/*
    function status_update($id)
{
	//get sales_incharges status with the help of sales Incharges ID
	$salesIncharge = DB::table('sales_incharges')
				->select('status')
				->where('id','=',$id)
				->first();

	//Check user status
	if($salesIncharge->status == '1'){
		$status = '0';
	}else{
		$status = '1';
	}

	//update sales_incharges status
	$values = array('status' => $status );
	DB::table('sales_incharges')->where('id',$id)->update($values);

    //session()->flash('success', '  successfully');
    return redirect()->route('sales_incharge.index');
}*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $divisions= Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::with(['customers'])->get();
        return view('admin.sales_incharge.create', compact(['employees','zones','areas','divisions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'employee_id' =>'required',
            'office_type' => 'required',
        ];

        $messages = [
            'employee_id.required'=>'Employee Name is Required',
        ];

        $request->request->add(['office_id' => null]);

        switch ($request->office_type){
            case 'D':
                 $request['office_id'] = $request->division_id;
                 $rules['office_id'] = Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','D')
                        ->where('office_id', $request->division_id)
                        ->where('employee_id', $request->employee_id);
                 });

                 $messages['office_id.unique']='Division has already been Taken';
                 break;
            case 'Z':
                $request['office_id'] = $request->zone_id;
                $rules['office_id']= Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','Z')
                        ->where('office_id', $request->zone_id)
                        ->where('employee_id',$request->employee_id);
                });

                $messages['office_id.unique']='Zone has already been Taken';

                break;
            case 'A':
                $request['office_id'] = $request->area_id;
                $rules['office_id']= Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','A')
                        ->where('office_id', $request->area_id)
                        ->where('employee_id',$request->employee_id);
                });

                $messages['office_id.unique']='Area has already been Taken';

                break;
        }

        $validator = $this->validate($request, $rules,$messages);

        $salesIncharge = SalesIncharge::create([
            'office_type'=> $request->office_type,
            'office_id' => $request->office_id,
            'is_active' => $request->is_active,
            'employee_id' => $request->employee_id,
        ]);

        Session::flash('success', 'Sales Incharge created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesIncharge  $salesIncharge
     * @return \Illuminate\Http\Response
     */
    public function show(SalesIncharge $salesIncharge)
    {
        return view('admin.sales_incharge.show', compact('salesIncharge'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesIncharge  $salesIncharge
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesIncharge $salesIncharge)
    {
        $employees = Employee::all();
        $divisions = Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::with(['customers'])->get();

        switch ($salesIncharge->office_type) {
            case 'D':
                $salesIncharge->division_id = $salesIncharge->office_id;
                break;

            case 'Z':
                $salesIncharge->zone_id = $salesIncharge->office_id;
                $zone = Zone::find($salesIncharge->office_id);
                $salesIncharge->division_id = $zone->division_id;
                break;

            case 'A':
                $salesIncharge->area_id = $salesIncharge->office_id;
                $area = Area::find($salesIncharge->office_id);
                $salesIncharge->division_id = $area->division_id;
                $salesIncharge->zone_id = $area->zone_id;

                break;

        }

        //dd($salesIncharge);

        return view('admin.sales_incharge.edit', compact(['salesIncharge','employees','divisions','zones','areas']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesIncharge  $salesIncharge
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, SalesIncharge $salesIncharge)
    {



        $rules = [
            'employee_id' =>'required',
            'office_type' => 'required',

        ];

        $messages = [
            'employee_id.required'=>'Employee Name is Required',
        ];

        $request->request->add(['office_id' => null]);

        switch ($request->office_type){
            case 'D':
                $request['office_id'] = $request->division_id;
                $rules['office_id'] = Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','D')
                        ->where('office_id', $request->division_id)
                        ->where('employee_id', $request->employee_id);


                });

                $messages['office_id.unique']='Division has already been Taken';

                break;
            case 'Z':
                $request['office_id'] = $request->zone_id;
                $rules['office_id']= Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','Z')
                        ->where('office_id', $request->zone_id)
                        ->where('employee_id',$request->employee_id);
                });

                $messages['office_id.unique']='Zone has already been Taken';

                break;
            case 'A':
                $request['office_id'] = $request->area_id;
                $rules['office_id']= Rule::unique('sales_incharges')->where(function ($query) use($request){
                    return $query->where('office_type','A')
                        ->where('office_id', $request->area_id)
                        ->where('employee_id',$request->employee_id);
                });

                $messages['office_id.unique']='Area has already been Taken';

                break;
        }


        /*$officeId = $salesIncharge->office_id;

        $this->validate($request, [

            'is_active' => [Rule::unique('sales_incharges')->ignore($officeId )]
        ]);*/

        $validator = $this->validate($request, $rules,$messages);


            $salesIncharge->office_type = $request->office_type;
            $salesIncharge->office_id = $request->office_id;
            $salesIncharge->employee_id = $request->employee_id;
            $salesIncharge->is_active = $request->is_active;


            $salesIncharge->save();
            Session::flash('success', 'Sales Incharge updated successfully');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesIncharge  $salesIncharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesIncharge $salesIncharge)
    {
        
        if($salesIncharge){
            $salesIncharge->delete();
           

            Session::flash('success', 'Sales Incharge deleted successfully');
            return redirect()->route('sales_incharge.index');
        }
    }
}
