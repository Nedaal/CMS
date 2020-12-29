@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="card-header">


   Create Post


</div>

<div class="card-body">

@if ($errors->any())

<div class="alert alert-danger">
<ul class="list-group">

    @foreach ($errors->all() as $error)
        <li class="list-group-item text-danger">
        {{$error}}
        </li>
    @endforeach
</ul>


</div>

    
@endif
<form action="{{isset($post)? route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
@csrf

@if (isset($post))

@method('PUT')
    
@endif

<div class="form-group">

    <label for="title" >title</label>

    <input type="text" class="form-control" name="title" id="title" value="{{isset($post)? $post->name:''}}">
</div>

<div class="form-group">

    <label for="description"> Description</label>
    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
</div>


<div class="form-group">

    <label for="content"> Content</label>
    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
</div>


<div class="form-group">

    <label for="published_at" >Published at</label>

    <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post)? $post->name:''}}">
</div>


<div class="form-group">

    <label for="image" >Image</label>

    <input type="file" class="form-control" name="image" id="image" >
</div>





<div class="form-group">
    <button class="btn btn-success">

    {{isset($post)? 'Save Post' : 'Add Post'}}

        
    </button>

</div>
</form>

</div>
</div>
</div>


@endsection