<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostControllerapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->image->store('posts');

      $post= Post::create(
           [
    'title'=>$request->title,
    'description'=>$request->description,
    'content'=>$request->content,
    'image'=>$image,
    'published_at'=>$request->published_at,
    'category_id'=>$request->category
           ]
           );


           if($request->tags){
               $post->tags()->attach($request->tags);
           }


return response()->json('Post has been Created successfully with id ');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $posts=Post::find(1)->where('category_id', '=', $request->id)->take(3)->get();

       return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
