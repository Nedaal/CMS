@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="card-header">


   Create Categories


</div>

<div class="card-body">

    @include('partial.error')

    
<form action="{{isset($category)? route('categories.update',$category->id):route('categories.store')}}" method="POST">
@csrf

@if (isset($category))

@method('PUT')
    
@endif

<div class="form-group">

    <label for="name" >Name</label>

    <input type="text" class="form-control" name="name" id="name" value="{{isset($category)? $category->name:''}}">
</div>
<div class="form-group">
    <button class="btn btn-success">

    {{isset($category)? 'Save Category' : 'Add Category'}}

        
    </button>

</div>
</form>

</div>
</div>
</div>


@endsection