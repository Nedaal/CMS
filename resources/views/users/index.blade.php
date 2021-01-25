@extends('layouts.app')

@section('content')
    
<div class="card card-default">

<div class="d-flex justify-content-end mb-2">

    <a href="" class="btn btn-success">Add User</a>

</div>
<div class="card-header">

    Users
</div>

<div class="card-body">

<table class="table">

   <thead>
    <th> Image</th>
       <th> name</th>
       <th> Email</th>
       <th> Role</th>
</thead> 

<tbody  >
    @foreach ($users as $user)

    <tr>

        <td> </td>
        <td>{{$user->name}}</td>
        

        <td> 
            {{$user->email}}
            
            
             </td>
             <td> 
                {{$user->role}}
                
                
                 </td>
        


                 <td> 

                   @if (!$user->isAdmin())
                   
                   <button class="btn btn-success"> Make Admin</button>
                       
                   @endif

                 </td>
      

         
    </tr>
        
    @endforeach
</tbody>

</table>



</div>

</div>


@endsection