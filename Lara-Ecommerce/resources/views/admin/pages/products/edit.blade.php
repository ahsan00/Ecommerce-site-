
@extends('admin.layout.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="card">
<div class="card-header">
  Add product

</div>

      <div class="card-body">
          <form action ="{{route('admin.product.update',$products->id)}}" method="post" enctype="multipart/form-data">
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
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->title}}">

          </div>
          <div class="form-group" >
            <label for="exampleInputPassword1">Description</label>

            <textarea name="description" rows="8" cols="80" class="form-control">{{$products->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" name="price" class="form-control" id="exampleInputEmail1" value="{{$products->price}}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" value="{{$products->quantity}}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Select Category</label>
            <select class="form-contril" name="category_id">
              <option value="">Please select a category for the  product</option>
              @foreach (App\category::orderBy('name','asc')->where ('parent_id',NULL)->get() as $parent)

             <option value="{{$parent->id}}">{{$parent->name}}</option>
               @foreach (App\category::orderBy('name','asc')->where ('parent_id',$parent->id)->get() as $child)
                <option value="{{$child->id}}">----->{{$child->name}}</option>
          @endforeach
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Select brand</label>
            <select class="form-contril" name="brand_id">
              <option value="">Please select a brand for the  product</option>
              @foreach (App\brand::orderBy('name','asc')->get() as $br)

             <option value="{{$br->id}}" >{{$br->name}}</option>

              @endforeach
            </select>
          </div>





          <div class="form-group">
            <label for="product_image">Product_image</label>
            <div class="row">
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control" id="exampleInputEmail1" >

              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control" id="exampleInputEmail1" >

              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control" id="exampleInputEmail1" >

              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control" id="exampleInputEmail1" >

              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control" id="exampleInputEmail1" >

              </div>

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
