
@extends('admin.layout.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
<div class="card-header">
  Add product

</div>

      <div class="card-body">
        <form action ="{{route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
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
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brand->name}}">

        </div>
        <div class="form-group" >
          <label for="exampleInputPassword1">Description</label>

          <textarea name="description" rows="8" cols="80" class="form-control">{{$brand->description}}</textarea>
        </div>


        <div class="form-group">

          <div class="row">
            <div class="col-md-4">
              <label for="old_image">old_image</label><br>
              <img src="{{asset('images/brand/'.$brand->image)}}" width="100" alt="no pic"><br>
              <label for="brand_image">new_image</label>
              <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" >
          </div>
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
