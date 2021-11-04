<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('user.comments.index', compact('comments'));
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
        // validate the form request... 
        $this->validate($request, [
            'name' => 'bail|required|string|min:3|max:255',
            'email' => 'bail|required|email',
            'comment' => 'bail|required|string|min:10|max:1000',
            'post_id' => 'bail|required|numeric',
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = null;

        // save the comment now... 
        $comment->save();

        // check if that was successful... 
        if (!$comment) {
            // Send an error message.... 
            Session::flash('error', ' There was an error submitting your comment');
        } else {
            // Send a success message if it was successful... 
            Session::flash('success', ' Your comment has been submitted successfully.');
        }

        // redirect back... 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
         // validate the form request... 
         $this->validate($request, [
            'name' => 'bail|required|string|min:3|max:255',
            'email' => 'bail|required|email',
            'comment' => 'bail|required|string|min:10|max:1000',
        ]);

        // Update the comment now... 
        $comment = $comment->update([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'user_id' => auth()->id() ?? null,
        ]);

        // check if that was successful... 
        if (!$comment) {
             // Send an error message.... 
             Session::flash('error', ' There was an error updating your comment');
        } else {
             // Send an error message.... 
             Session::flash('success', ' Your comment has been updated successfully.');
        }

        // redirect back... 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // delete the comment here... 
        $deleted = $comment->delete();

        if (!$deleted) {
             // Send an error message.... 
             Session::flash('error', ' There was an error deleting the comment');
        } else {
            // Send an success message.... 
            Session::flash('success', ' Comment has been deleted successfully.');
        }

        // redirect back... 
        return redirect()->back();

    }
}
