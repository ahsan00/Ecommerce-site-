@extends('layout.master')
@section('content')
<div class="container">

<div class="row">
  <div class="col-md-4">
 <div class="list-group">
   <a href="#" class="list-group-item">
<img src="{{App\Helper\imagehelper::getuserimage( Auth::user()->id)}}" alt="no pic " width="50">
   </a>

  <a href="{{route('user.profile')}}" class="list-group-item{{Route::is('user.profile') ? 'active' : ''}}"> Profile</a>
  <a href="{{route('user.updateprofile')}}" class="list-group-item{{Route::is('user.updateprofile') ? 'active' : ''}}">Update Profile</a>
  <a href="{{route('user.dashboard')}}" class="list-group-item">Dashboard</a>


 </div>
  </div>


  <div class="col-md-8 mt=2">
    <div class="card card-body">
      @yield('sub-content');

    </div>



  </div>

</div>

</div>

@endsection
