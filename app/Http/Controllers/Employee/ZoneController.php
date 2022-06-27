<?php

namespace App\Http\Controllers\Employee;


use App\Http\Controllers\Controller;
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
        return view('employee.zone.index', compact('zones'));
    }
}
