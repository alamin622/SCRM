<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use App\User;
use App\Post;
use App\Contact;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home(){

        return view('website.home');
    }

    public function about(){
        return view('website.about');
    }

    public function category(){

            return view('website.category');

    }

    public function tag(){

            return view('website.tag');

    }

    public function contact(){
        return view('website.contact');
    }

    public function post(){

            return view('website.post');

    }


}
