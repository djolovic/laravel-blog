<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Post;


class PostsController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth')->except(['index', 'show']);
   }

    public function index(){

       // $posts = Post::orderBy('created_at', 'desc')->get();


        $posts = Post::latest();

        if ($month = request('month')) {

                   $posts->whereMonth('created_at', Carbon::parse($month)->month);
    }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) year , monthname(created_at) month , count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();


        //return view('posts.index', compact('posts'));

        return view('posts.index', compact('posts', 'archives') );
   }

    public function show(Post $post){

       // $post = Post::find($id);



        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        /*
       // Create new post using the request data

       $post = new Post;

       $post->title = request('title');
       $post->body = request('body');

       // Save it to the database

       $post->save();

        */
        //Validation

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'

        ]);

       // This will create and save new post

        auth()->user()->publish(

            new Post(request(['title', 'body']))
        );
        /*

        // session()->flash('message', 'Your post has been published');

          Post::create([
           'title'=>request('title'),
           'body' =>request('body'),
           'user_id'=> auth()->id()
       ]);

        */
       //Redirect to home page

       return redirect('/');

    }
}
