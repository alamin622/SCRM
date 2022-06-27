<?php

namespace App\Http\Controllers;

use phpDocumentor\Reflection\Project;
use Session;
use App\Type;
use App\Customer;
use App\Post;
use App\Division;
use App\Zone;
use App\Area;
use App\Attachment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('attachments', 'category')->orderBy('created_at', 'DESC')->paginate(10);
        //dd($posts);
        return view('admin.post.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::with(['zones'])->get();
        $zones = Zone::with(['areas'])->get();
        $areas = Area::with(['customers'])->get();
        $types = Type::all();
        $customers = Customer::all();
        return view('admin.post.create', compact(['types', 'zones', 'areas', 'divisions', 'customers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $start_time  = Carbon::parse($request->start_time);
        $end_time = Carbon::parse($request->end_time);
        $visiting_hours = $end_time->diffInSeconds($start_time);
        $visiting_hours = gmdate('H:i:s', $visiting_hours);
        //        dd($visiting_hours);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|max:500',

        ]);
        $post = Post::create([
            'title' => $request->title,
            'image' => 'image.jpg',
            'description' => $request->description,
            'type_id' => $request->type,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'visiting_hours' => $visiting_hours,
            'nextVisitDateTime' => $request->nextVisitDateTime,
            'VisitDate' => $request->VisitDate,
            'division_id' => $request->division,
            'zone_id' => $request->zone,
            'area_id' => $request->area,
            'customer_id' => $request->customer,
        ]);
        //dd($request->all());
        if ($request->hasFile('image')) {
            foreach ($request->file("image") as $file) {
                $image_new_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/post'), $image_new_name);
                $attachment = new Attachment([
                    "name" => $image_new_name,
                    "real_name" => $file->getClientOriginalName(),
                    "path" => "storage/post/" . $image_new_name,
                    "extension" => $file->getClientOriginalExtension(),
                    //"size" => $request->file('image')->getSize(),
                ]);
                $post->attachments()->save($attachment);
            }
        }

        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $divisions = Division::all();
        $zones = Zone::all();
        $areas = Area::all();
        $types = Type::all();
        $customers = Customer::all();
        return view('admin.post.edit', compact(['post', 'customers', 'types', 'divisions', 'zones', 'areas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $post->title = $request->title;
        $post->visiting_hours = $request->visiting_hours;
        $post->description = $request->description;
        $post->nextVisitDateTime = $request->nextVisitDateTime;
        $post->VisitDate = $request->VisitDate;
        $post->type_id = $request->type;
        $post->division_id = $request->division;
        $post->zone_id = $request->zone;
        $post->area_id = $request->area;
        $post->customer_id = $request->customer;


        if ($request->hasFile('image')) {
            foreach ($request->file("image") as $file) {
                $image_new_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/post'), $image_new_name);
                $attachment = new Attachment([
                    "name" => $image_new_name,
                    "real_name" => $file->getClientOriginalName(),
                    "path" => "storage/post/" . $image_new_name,
                    "extension" => $file->getClientOriginalExtension(),
                    //"size" => $request->file('image')->getSize(),


                ]);
                $post->attachments()->save($attachment);
            }
        }
        $post->save();
        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $post->delete();
            Session::flash('Post deleted successfully');
        }

        return redirect()->back();
    }
}
