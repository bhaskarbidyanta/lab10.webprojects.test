<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id()){
            $post=Post::all();
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                return view('home.homepage',compact('post'));
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function homepage(){
        $post=Post::all();
        return view('home.homepage',compact('post'));
    }

    public function post_details($id){
        $post=Post::find($id);
        return view('home.post_details',compact('post'));
    }

    public function create_post(){
        return view('home.create_post');
    }

    public function user_post(Request $request){
        $user=Auth()->user();
        $userid=$user->id;
        $username=$user->name;
        $usertype=$user->usertype;


        $post=new Post;
        $post->title=$request->title;

        $post->description=$request->description;
        $post->user_id=$userid;
        $post->name=$username;
        $post->usertype=$usertype;
        $post->post_status='pending';


        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage',$imagename);
            $post->image=$imagename;
        }

        $post->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
