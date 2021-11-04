<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('user.category.index', compact('categories'));
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

        // create the category... 
        $category = Category::create($validatedData);

        // check if the category was created successfully... 
        if(!$category) {
            // send an error flash message... 
            Session::flash('error', ' There was an error creating the category');
        } else {
             // send a success flash message... 
             Session::flash('success', ' Category created successfully.');
        }

        // redirect back... 
        return redirect()->back();      

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         // validate the form... 
         $this->validate($request, [
            'name' => 'required|string|min:2|max:255|unique:categories,name',
        ]);

        // create the category... 
        $updated = $category->update([
            'name' => $request->name,
        ]);

        // check if the category was created successfully... 
        if(!$updated) {
            // send an error flash message... 
            Session::flash('error', ' There was an error updating the category');
        } else {
             // send a success flash message... 
             Session::flash('success', ' Category updated successfully.');
        }

        // redirect back... 
        return redirect()->back();      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted  = $category->delete();

        if(!$deleted) {
            Session::flash('error', ' OOP!!! There was an error deleting category. Please try again. ');
        } else {
            Session::flash('success', ' Category deleted successfully.');
        }

        // redirect back... 
        return redirect()->back();
    }
}
