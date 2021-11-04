<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('blog.index', compact('posts'));
    }

    public function getSingle($slug) {
        $post = Post::where('slug', $slug)->first();
        
        return view('blog.single', compact('post'));
    }

    public function comment(Request $request) {
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
        $comment->user_id = auth()->id() ?? null;

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
}
