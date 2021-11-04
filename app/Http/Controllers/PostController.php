<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('user.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate the form data...
        $this->validate($request, array(
            'title' => 'bail|required|min:2|max:255|string|unique:posts,title',
            'slug' => 'bail|required|alpha_dash|min:3|max:255|unique:posts,slug',
            'body' => 'required|min:10|max:10000',
            'category_id' => 'required|integer',
            'author' => 'sometimes|string|min:3|max:255',
            //'image' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,git,',
        ));

        // create the post...
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        // $post->body = $request->body;
        $post->author = $request->author ?? auth()->user()->username;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->created_at = now();
        $post->updated_at = now();

        // check if the form has an image
        if ($request->hasFile('image')) {

            // get the file...
            $image = $request->file('image');

            // get the file name...
            $filename = uniqid('post_image', true) . "." . time() . "." . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();

            //Set location for the image...
            $location = storage_path('app/public/postimages' . $filename);

            //Resize and save the image
            Image::make($image)->resize(800, 400)->save($location);

            // set the post imag to the image gotten from the form...
            $post->image = $filename;

        }

        // save the post...
        $post->save();

        //Synchronize the tags to the post...
        $post->tags()->sync($request->tags, false);

        // check if the whole process was  successful...
        if (!$post) {
            // send an error message...
            Session::flash('error', ' There was an error creating post. Check to see all fields are filed.');

        } else {
            // send a success message...
            Session::flash('success', ' Post created successfully.');
        }

        // return redirect()->route('post.show', $post->id);
        return redirect()->route('post.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('user.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        // return the view here...
        return view('user.posts.edit', compact('tags', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Validate the form data...
        $this->validate($request, array(
            'title' => 'required|min:2|max:255|string',
            'slug' => 'required|alpha_dash|min:3|max:255',
            'body' => 'required|min:10|max:10000',
            'category_id' => 'required|integer',
            //'image' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,git,',
            'author' => 'sometimes|string|min:3|max:255',
        ));

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        // $post->body = $request->body;
        $post->author = $request->author ?? auth()->user()->username;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->updated_at = now();

        // check if the request has file...
        if ($request->hasFile('image')) {
            // get the file...
            $image = $request->file('image');

            // get the file name...
            $filename = uniqid('post_image', true) . "." . time() . "." . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();

            // get the old image image before updating the database...
            $oldImage = $post->image;

            //Set location for the image...
            $location = storage_path('app/public/postimages' . $filename);

            //Resize and save the image
            Image::make($image)->resize(800, 400)->save($location);

            // save the image to the database...
            $post->image = $filename;

            //Delete the old image from the database and filesystem..
            Storage::delete('public/postimages' . $oldImage);
        }

        // Now Update the post table...
        $post->save();

        //Check if there are tags attached to the post...
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        //Send a flash message...
        Session::flash('success', 'Post updated successfully!');

        //Redirect to the post page...
        return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // First detach the post from its tags...
        $post->tags()->detach();

        // Delete the post comments...
        $post->comments()->delete();

        // delete the post image as well...
        Storage::delete('public/postimages' . $post->image);

        // delete the main post...
        $post->delete();

        // send a success flash message...
        Session::flash('success', ' Post deleted successfully');

        // redirect back to the index page...
        return redirect()->back();
    }
}
