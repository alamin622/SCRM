<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at', 'DESC')->take(10)->get();
       $postCount = Post::all()->count();
       $categoryCount = Category::all()->count();
       $tagCount = Tag::all()->count();
       $userCount = User::all()->count();
       $customerCount = Customer::all()->count();
        return view('admin.dashboard.index', compact(['posts','postCount','categoryCount','tagCount','userCount','customerCount']));
    }
}
