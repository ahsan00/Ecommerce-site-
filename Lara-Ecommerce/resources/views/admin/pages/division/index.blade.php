
@extends('admin.layout.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
<div class="card-header">
  Add division

</div>

      <div class="card-body">
        <table class="table table-hover table-striped">

          <tr>
            <th>#</th>
            <th>Name</th>

            <th>prority</th>
            <th>action</th>
          </tr>
          @foreach ($division as $division)
          <tr>
            <td>#</td>
            <td>{{$division->name}}</td>
            <td>{{$division->prority}}</td>




            <td>
              <a href="{{route('admin.division.edit',$division->id)}}" class="btn btn-success">Edit</a>
              <a href="#deleteModal {{$division->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>


              <div class="modal fade" id="deleteModal {{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <form class="form-inline" action="{{route('admin.division.delete',$division->id)}}" method="post">
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
