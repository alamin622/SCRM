<?php

namespace App\Http\Controllers\Employee;

use Session;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(8);
        return view('employee.category.index', compact('categories'));
    }
}
