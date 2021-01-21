<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\Tags\CreateTagsRequest;

use App\Http\Requests\Tags\UpdateTagsRequest;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagsRequest $request)
    {
    

   Tag::create([
   'name'=>$request->name
   ]);

   session()->flash('success','Tag Created successfully');

   return redirect(route('tags.index'));

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
    public function edit(Tag $Tag)
    {
      return view('tags.create')->with('Tag',$Tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, Tag $Tag )
    {
        // $Tag->name=$request->name;
        // $Tag->save();

        $Tag->update([
            'name'=>$request->name
        ]);
        session()->flash('success','Tag UPdated successfully');
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {

        if($Tag->posts->count() >0){

            session()->flash('error','The Tag Cannot be deleted because it has many posts');
        }
        $Tag->delete();

        session()->flash('success','The Tag has been deleted successfully');
        return redirect(route('tags.index'));
    }
}
