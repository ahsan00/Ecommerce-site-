@extends('layout.master')



@section('content')
<div class="container margin-top-20">

    <div class="row">
      <div class="col-md-4">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @php
   $i=1;
  @endphp
    @foreach ($product->images as $image)
    <div class=" productitem carousel-item {{ $i==1 ? 'active' : ''}}">
      <img class="d-block w-100" src="{{asset('images/product/'.$image->image)}}" alt="First slide">

  </div>
  @php
 $i++;
@endphp
    @endforeach
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="mt-3">
<p>category <span class="badge badge-info">{{$product->category->name}}</span></p>
  <p>Brand<span class="badge badge-info">{{$product->brand->name}}</span></p>

</div>


      </div>
    </div>
      <div class="col-md-8">
         <div class="widget">
           <h3>ALL products</h3>
           <h3>{{$product->title}}</h3>
           <h3>{{$product->price}} Taka</h3>
           <span class="badge badge-primary">
             {{$product->quantity<1 ? 'no item is selected' : $product->quantity.'item in stock'}}
           </span>
           <div class="desscription">
             {{$product->description}}
           </div>

        </div>


         <div class="widget">


         </div>
</div>
@endsection
