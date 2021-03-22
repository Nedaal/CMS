<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;

class PostController extends Controller
{






public function __construct(){

    $this->middleware('verifycategories')->only(['create','store']);
}






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest  $request)
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

session()->flash('success','New Post has been Added');
return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request,Post $post)
    {

        // $data=$request->only(['title','description','published_at','content','category_id']);

        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['published_at']=$request->published_at;
        $data['content']=$request->content;
        $data['category_id']=$request->category;


     if($request->hasFile('image')){

      $image=  $request->image->store('posts');
      Storage::delete($post->image);

      $data['image']=$image;
     }


if($request->tags){
    $post->tags()->sync($request->tags);
}


   $post->update($data);




   session()->flash('success','The post has been updated successfully');

   return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $post=Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            Storage::delete($post->image);
            $post->forceDelete();
        } else{
            $post->delete();
        }

        session()->flash('success','Post has been Trashed successfully ');

       return  redirect(route('posts.index'));
    }




    public function trashed(){

   $trashed=Post::onlyTrashed()->get();

   return view('posts.index')->with('posts',$trashed);
    }


    public function restore($id){

 $post=Post::withTrashed()->where('id',$id)->first();


$post->restore();

session()->flash('success','Post has been Restored successfully ');


return redirect()->back();
    }
}
