<?php


namespace App\Http\Controllers\Employee;

use Session;
use App\Http\Controllers\Controller;
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
        return view('employee.area.index', compact('areas'));
    }
}
