<?php

namespace App\Http\Controllers;

use Session;
use App\Customer;
use App\Category;
use App\Type;
use App\Division;
use App\Zone;
use App\Area;
use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        $divisions = Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::all();
        return view('admin.customer.create', compact(['types', 'divisions', 'zones', 'areas', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
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
            'password' => 'min:6',
            'password_confirm' => 'required_with:password|same:password|min:6',
            'children_dob' => 'before:today',
            'birthdate'  => 'before:-18 years',
            'nid_number' => 'digits_between:11,13',
            'image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'shop_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'nid_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',


        ]);


        //dd($request->all());


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
        $customer = Customer::create([
            'name' => $request->name,
            'nid_image' => $nidImage,
            'image' => $profileImage,
            'shop_image' => $shopImage,
            'cus_id' => $request->cus_id,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'email' => $request->email,
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
            'zone_id' => $request->zone,
            'area_id' => $request->area,
            'type_id' => $request->type,
            'category_id' => $request->category,

        ]);

        Session::flash('success', 'customer  created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        $types = Type::all();
        $categories = Category::all();
        $divisions = Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::all();
        return view('admin.customer.edit', compact(['customer', 'types', 'divisions', 'zones', 'areas', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        //dd($request->all());
        $this->validate($request, [

            'email' => 'required',
            'name' => 'required',
            'shop_name' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'children_dob' => 'before:today',
            'birthdate'  => 'before:-18 years',
            'nid_number' => 'digits_between:11,13',
            'image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'shop_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',
            'nid_image' => 'mimes:jpg,png,jpeg,gif,svg | max:7000',

        ]);

        $profileImage = $nidImage = $shopImage = null;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/customer/', $image_new_name);
            $profileImage = '/storage/customer/' . $image_new_name;
            $customer->image = $profileImage;
        }
        if ($request->hasFile('nid_image')) {
            $nid_image = $request->nid_image;
            $image_new_name = Str::uuid() . '.' . $nid_image->getClientOriginalExtension();
            $nid_image->move('storage/customer/', $image_new_name);
            $nidImage = '/storage/customer/' . $image_new_name;
            $customer->nid_image = $nidImage;
        }
        if ($request->hasFile('shop_image')) {
            $shop_image = $request->shop_image;
            $image_new_name = Str::uuid() . '.' . $shop_image->getClientOriginalExtension();
            $shop_image->move('storage/customer/', $image_new_name);
            $shopImage = '/storage/customer/' . $image_new_name;
            $customer->shop_image = $shopImage;
        }
        $customer->name = $request->name;
        $customer->cus_id = $request->cus_id;
        $customer->nickname = $request->nickname;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->present_address = $request->present_address;
        $customer->permanent_address = $request->permanent_address;
        $customer->religion = $request->religion;
        $customer->type_id = $request->type;
        $customer->shop_name = $request->shop_name;
        $customer->nid_number = $request->nid_number;
        $customer->birthdate = $request->birthdate;
        $customer->marriage_dob = $request->marriage_dob;
        $customer->family_member = $request->family_member;
        $customer->father_name = $request->father_name;
        $customer->mother_name = $request->mother_name;
        $customer->occupation = $request->occupation;
        $customer->business_year = $request->business_year;
        $customer->number_of_children = $request->number_of_children;
        $customer->children_dob = $request->children_dob;
        $customer->division_id = $request->division;
        $customer->zone_id = $request->zone;
        $customer->area_id = $request->area;
        $customer->category_id = $request->category;

        $customer->save();
        Session::flash('success', 'customer  updated successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        if ($customer) {
            $customer->delete();
            Session::flash('customer deleted successfully');
        }
        return redirect()->back();
    }
}
