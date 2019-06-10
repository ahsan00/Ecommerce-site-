@extends('pages.user.master')
@section('sub-content')
<div class="container mt-2">
  <h2>Welcome {{$user->first_name.''.$user->last_name}}</h2>
  <p>You can change your profile and update</p>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body mt-2" onclick="location.href='{{route('user.profile')}}'">
       <h3>update profile</h3>
      </div>
    </div>

  </div>

</div>

@endsection
