@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="card-header">


   Create tags


</div>

<div class="card-body">

    @include('partial.error')

    
<form action="{{isset($tag)? route('tags.update',$tag->id):route('tags.store')}}" method="POST">
@csrf

@if (isset($tag))

@method('PUT')
    
@endif

<div class="form-group">

    <label for="name" >Name</label>

    <input type="text" class="form-control" name="name" id="name" value="{{isset($tag)? $tag->name:''}}">
</div>
<div class="form-group">
    <button class="btn btn-success">

    {{isset($tag)? 'Save tag' : 'Add tag'}}

        
    </button>

</div>
</form>

</div>
</div>
</div>


@endsection