@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="d-flex justify-content-end mb-2">

    <a href="{{route('categories.create')}}" class="btn btn-success">Add Categories</a>

</div>
<div class="card-header">

    Categories
</div>

<div class="card-body">

<table class="table">

   <thead>
       <th> Name</th>
       <th> Post Count</th>
</thead> 

<tbody>
    @foreach ($categories as $category)

    <tr>

        <td>{{$category->name}}</td>
        
        <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm "> Edit</a>
        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
        
        
        </td>


        <td>


   {{$category->posts->count()}}

        </td>
     

    </tr>
        
    @endforeach
</tbody>

</table>

<form action="" method="POST" id="deleteCategoryForm">

    @method('DELETE')
@csrf
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to Delete this Category ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No Go Back</button>
              <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
          </div>
        </div>
      </div>




</form>


</div>

</div>


@endsection

@section('scripts')
    <script>
   function handleDelete(id){
 
       $('#deleteModal').modal('show');
       var form= document.getElementById('deleteCategoryForm');
       form.action='/categories/'+id;
      
   }

    </script>
@endsection