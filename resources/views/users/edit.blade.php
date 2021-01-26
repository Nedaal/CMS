@extends('layouts.app')

@section('content')

        <div class="col-md-8">

            @include('partial.error')
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                  <form action="{{route('users.update-profile')}}" method="POST">
                      @csrf

            @method('PUT')


            <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">

              </div>

              <div class="form-group">

                <label for="about">about</label>
                <textarea class="form-control" name="about" id="about" rows="10" cols="50" >
                      {{$user->about}}

                </textarea>
              </div>
             
               <button class="btn btn-success" type="submit"> Update Profile</button>


                  </form>
                </div>
            </div>
        </div>
  

@endsection
