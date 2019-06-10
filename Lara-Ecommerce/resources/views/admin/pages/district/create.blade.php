
@extends('admin.layout.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
<div class="card-header">
  Add product

</div>

      <div class="card-body">
          <form action ="{{route('admin.district.store')}}" method="post" enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

          </div>



          <div class="form-group">
            <label for="exampleInputEmail1">Select a division for this district</label>
          <select class="form-control" name="division_id">
            <option value="">Select a Division For this District</option>
            @foreach ($division as $division)
            <option value="{{$division->id}}">{{$division->name}}</option>

             @endforeach

          </select>

          </div>







          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

  </div>

    </div>


  <!-- partial -->
</div>
</div>
<!-- main-panel ends -->


@endsection
