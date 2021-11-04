<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('user.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the form... 
         $validatedData = $this->validate($request, [
            'name' => 'required|string|min:2|max:255|unique:categories,name',
        ]);

        // create the tag... 
        $tag = Tag::create($validatedData);

        // check if the tag was created successfully... 
        if(!$tag) {
            // send an error flash message... 
            Session::flash('error', ' There was an error creating the tag');
        } else {
             // send a success flash message... 
             Session::flash('success', ' Tag created successfully.');
        }

        // redirect back... 
        return redirect()->back();      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
         // validate the form... 
         $this->validate($request, [
            'name' => 'required|string|min:2|max:255|unique:categories,name',
        ]);

        // create the category... 
        $updated = $tag->update([
            'name' => $request->name,
        ]);

        // check if the category was created successfully... 
        if(!$updated) {
            // send an error flash message... 
            Session::flash('error', ' There was an error updating the tag');
        } else {
             // send a success flash message... 
             Session::flash('success', ' Tag updated successfully.');
        }

        // redirect back... 
        return redirect()->back();      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $deleted = $tag->delete();

        if (!$deleted) {
            Session::flash('error', ' There was an error deleting tag. Please try again');
            
        } else {
            Session::flash('success', ' Tag deleted successfully.');
        }

        // redirect back... 
        return redirect()->back();
    }
}
