
@extends('admin.layout.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
<div class="card-header">
  Add brand

</div>

      <div class="card-body">
        <table class="table table-hover table-striped">

          <tr>
            <th>#</th>
            <th>brand title</th>
            <th> image</th>
          
            <th>action</th>
          </tr>
          @foreach ($brand as $brand)
          <tr>
            <td>#</td>
            <td>{{$brand->name}}</td>
            <td>
      <img src="{{asset('images/brand/'.$brand->image)}}" width="100" alt="no pic">

            </td>

            <td>
              <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-success">Edit</a>
              <a href="#deleteModal {{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>


              <div class="modal fade" id="deleteModal {{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">
                         ...
                         <form class="form-inline" action="{{route('admin.brand.delete',$brand->id)}}" method="post">
                         {{csrf_field()}}
                         <input type="submit" class="btn btn-danger" value="delete">

                       </div>
                       <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                       </div>
                     </div>
                   </div>
                 </div>



            </td>
          </tr>
           @endforeach
        </table>
      </div>

    </div>


  <!-- partial -->
</div>
</div>
<!-- main-panel ends -->


@endsection
