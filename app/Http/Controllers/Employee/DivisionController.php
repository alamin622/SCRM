<?php

namespace App\Http\Controllers\Employee;

use Session;
use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('created_at', 'DESC')->paginate(10);
        return view('employee.division.index', compact('divisions'));
    }
}
