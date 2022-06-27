<?php

namespace App\Http\Controllers;
use Session;
use Carbon\Carbon;
use App\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = Attachment::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.attachment.index', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attachment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* //dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:attachments,name',
            'image' => 'required',
            'real_name' => 'required',
            'path' => 'required',
            'size' => 'required',
            'extension' => 'required',

        ]);
        $attachment = Attachment::create([
            'name' => $request->name,
            'image' => 'image.jpg',
            'path' => $request->path,
            'size' => $request->size,
            'extension' => $request->extension,
            'published_at' => Carbon::now(),
        ]);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //
    }
}
