@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="d-flex justify-content-end mb-2">

    <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>

</div>
<div class="card-header">

    Posts
</div>

<div class="card-body">

<table class="table">

   <thead>
    <th> Image</th>
       <th> Title</th>
</thead> 

<tbody  >
    @foreach ($posts as $post)

    <tr>

        <td> <img src=" {{ asset('/storage/'.$post->image) }}" width ="60px" height="60px" alt=""></td>
        <td>{{$post->title}}</td>
        
        <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm "> Edit</a>
         <button class="btn btn-danger btn-sm"> Delete</button>
        </td>
        {{-- <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm "> Delete</a></td> --}}
    </tr>
        
    @endforeach
</tbody>

</table>



</div>

</div>


@endsection