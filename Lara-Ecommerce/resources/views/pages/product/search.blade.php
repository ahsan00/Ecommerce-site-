@extends('layout.master')
@section('content')
<div class="container margin-top-20">

    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
       <a href="#" class="list-group-item list-group-item-action">First item</a>
       <a href="#" class="list-group-item list-group-item-action">Second item</a>
        <a href="#" class="list-group-item list-group-item-action">Third item</a>
       </div>

      </div>
      <div class="col-md-8">
         <div class="widget">
           <h3>searched products
        <span class="badge badge-primary">

       {{$search}}

        </span>


           </h3>

        <div class="row">
          @foreach ($products as $product)

          <div class="col-md-3">
            <div class="card">
              @php
              $i=1;
              @endphp
              @foreach ($product->images as $image)
              @if($i>0)
              <a href="{{route('product.show',$product->slug)}}">
            <img class="card-img-top feature-img" src="{{asset('images/product/'.$image->image)}}" alt="Card image"></a>
              @endif
              @php
              $i--;
              @endphp
            @endforeach;
         <div class="card-body">
        <h4 class="card-title">

         <a href="{{route('product.show',$product->slug)}}">{{$product->title}}</a>
        </h4>
         <p class="card-text">{{$product->price}}</p>
         <a href="#" class="btn btn-primary">Add to cart</a>
     </div>
     </div>
      </div>
@endforeach;
      </div>


        </div>


         <div class="widget">
           <h3>Featured products</h3>
         </div>

      </div>


    </div>

@endsection
