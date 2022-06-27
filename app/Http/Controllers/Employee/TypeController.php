<?php

namespace App\Http\Controllers\Employee;

use Session;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('created_at', 'DESC')->paginate(10);
        return view('employee.type.index', compact('types'));
    }
}
