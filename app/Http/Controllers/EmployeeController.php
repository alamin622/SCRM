<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Session;

use App\Customer;
use App\Division;
use App\Role;
use App\Zone;
use App\Area;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        (Auth::user()->hasRole(['admin']));
        (Auth::user()->hasRole(['admin','employee']));


        $employees = Employee::orderBy('created_at', 'DESC')->paginate(10);
       //dd($employees);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $divisions= Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::all();
        $users = User::with(['employee'])->get();
        return view('admin.employee.create', compact(['divisions','zones','areas','users','roles']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
//        try {
            $this->validate($request, [
                'email' => 'required|unique:users',
                'name' => 'required',
                'shop_name' => 'required',
                'phone' => 'required',
                'present_address' => 'required',
                'password' => 'min:6',
                'password_confirm' => 'required_with:password|same:password|min:6',
                'children_dob' => 'before:today',
                'birthdate'  => 'before:-18 years',
                'nid_number' => 'digits_between:11,13',
                'image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
                'shop_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
                'nid_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',

            ]);

            \DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::where('slug', 'hrm-employee')->first();
            $user->roles()->attach($role);

            $profileImage = $nidImage = $shopImage = null;

            if ($request->hasFile('image')) {
                $image = $request->image;
                $image_new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/customer/', $image_new_name);
                $profileImage = '/storage/customer/' . $image_new_name;
            }
            if ($request->hasFile('nid_image')) {
                $nid_image = $request->nid_image;
                $image_new_name = Str::uuid() . '.' . $nid_image->getClientOriginalExtension();
                $nid_image->move('storage/customer/', $image_new_name);
                $nidImage = '/storage/customer/' . $image_new_name;
            }
            if ($request->hasFile('shop_image')) {
                $shop_image = $request->shop_image;
                $image_new_name = Str::uuid() . '.' . $shop_image->getClientOriginalExtension();
                $shop_image->move('storage/customer/', $image_new_name);
                $shopImage = '/storage/customer/' . $image_new_name;
            }

            $employee = Employee::create([
                'emp_id'=>$request->emp_id,
                'phone' => $request->phone,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'shop_name' => $request->shop_name,
                'nid_number' => $request->nid_number,
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
                'user_id' => $user->id,
                'zone_id' => $request->zone,
                'area_id' => $request->area,
                'nid_image' => $nidImage,
                'image' => $profileImage,
                'shop_image' => $shopImage,
                'role_id' => $request->role,
            ]);

            \DB::commit();
            Session::flash('success', 'Employee has been created successfully.');
            return redirect()->back();
        /*} catch (\Exception $exception) {
            \DB::rollBack();

            Session::flash('error', 'Something went wrong, please try again.');
            return redirect()->back();
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('user')->find($id);

        return view('admin.employee.show', compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $divisions= Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::all();
        $users = User::with(['employee'])->get();
        return view('admin.employee.edit', compact(['employee','divisions','zones','areas','users']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee  )
    {
       // dd($request->all());
        $userId = optional($employee->user)->id;

        $this->validate($request, [
            'email' => ['required',Rule::unique('users')->ignore($userId)],
            'name' => 'required',
            'shop_name' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'password' => 'min:6',
            'password_confirm' => 'required_with:password|same:password|min:6',
            'children_dob' => 'before:today',
            'birthdate'  => 'before:-18 years',
            'nid_number' => 'digits_between:11,13',
            'image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'shop_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'nid_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
        ]);


        \DB::beginTransaction();
        // According to role user update

        $user = User::find($userId);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->nickname = $request['nickname'];
        $user->password = Hash::make($request->password);
        $user->save();

        //dd($user);
        $profileImage = $nidImage = $shopImage = null;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $profileImage = '/storage/customer/' . $image_new_name;
            /*unlink($employee->image);*/
            $employee->image = $profileImage;

        }
        if ($request->hasFile('nid_image')) {
            $nid_image = $request->nid_image;
            $image_new_name = Str::uuid() . '.' . $nid_image->getClientOriginalExtension();
            $nid_image->move('storage/customer/', $image_new_name);
            $nidImage = '/storage/customer/' . $image_new_name;
           /* unlink($employee->nid_image);*/
            $employee->nid_image = $nidImage;

        }
        if ($request->hasFile('shop_image')) {
            $shop_image = $request->shop_image;
            $image_new_name = Str::uuid() . '.' . $shop_image->getClientOriginalExtension();
            $shop_image->move('storage/customer/', $image_new_name);
            $shopImage = '/storage/customer/' . $image_new_name;
            $employee->shop_image = $shopImage;

        }

        $employee->emp_id = $request->emp_id;
        $employee->phone = $request->phone;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->religion = $request->religion;
        $employee->shop_name = $request->shop_name;
        $employee->nid_number = $request->nid_number;
        $employee->birthdate = $request->birthdate;
        $employee->marriage_dob = $request->marriage_dob;
        $employee->family_member = $request->family_member;
        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->occupation = $request->occupation;
        $employee->business_year = $request->business_year;
        $employee->number_of_children = $request->number_of_children;
        $employee->children_dob = $request->children_dob;
        $employee->division_id = $request->division;
        $employee->zone_id = $request->zone;
        $employee->area_id = $request->area;
        $employee->role_id = $request->role;

        \DB::commit();
        $employee->save();
        Session::flash('success', 'HRM Employee  updated successfully');
        return redirect()->back();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee ){

            $employee->delete();
        }
            Session::flash('HRM Employee  deleted successfully');

        return redirect()->back();
    }
}
