@extends('layout.master')
@section('content')
<div class="container margin-top-20">

    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
          @foreach (App\category::orderBy('name','asc')->where ('parent_id',NULL)->get() as $parent)
          <a href="#main.{{$parent->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">
          <img src="{{asset('images/category/'.$parent->image)}}" width="50">
          {{$parent->name}}
          </a>
        <div class=" child-rows collapse" id="main.{{$parent->id}}" >
        @foreach (App\category::orderBy('name','asc')->where ('parent_id',$parent->id)->get() as $child)

        <a href="#main.{{$parent->id}}" class="list-group-item list-group-item-action">

            <img src="{{asset('images/category/'.$child->image)}}" width="50">
            {{$child->name}}
            </a>

            @endforeach

        </div>

          @endforeach
       </div>

      </div>
      <div class="col-md-8">
         <div class="widget">
           <h3>ALL products
<span class="badge badge-info">

{{$category->name}}
</span> </h3>
@php
$products=$category->products()->paginate(9);
@endphp

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
