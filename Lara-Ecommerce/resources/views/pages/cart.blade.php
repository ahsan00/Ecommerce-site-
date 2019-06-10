@extends('layout.master')
@section('content')
<div class="container margin-top-20">
  <h2>my cart</h2>
  <table class="table table-bordered table-stripe">
    <thead>
      <tr>
        <th>No.</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Quantity</th>
        <th>Unit Price</th>
        <th>sub totalprice</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @php
     $totalprice=0;
      @endphp
     @foreach (App\cart::totalcart() as $cart)
     <tr>
       <td>
   {{ $loop->index+1}}

       </td>
       <td>

   <a href="{{route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</a>

       </td>
       <td>
         @if($cart->product->images->count()>0)

         <img src="{{asset('images/product/'.$cart->product->images->first()->image)}}" width="100" alt="">
         @endif

       </td>
       <td>
<form class="form-inline" action="{{route('cart.update',$cart->id)}}" method="post">
 @csrf
 <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}"/>
 <button type="submit" class="btn btn-success">Update</button>
</form>
 </td>
<td>
{{$cart->product->price}} Taka
</td>
<td>
@php
$totalprice+=$cart->product->price*$cart->product_quantity;
@endphp
{{$cart->product->price*$cart->product_quantity}} Taka

</td>

<td>
<form class="form-inline" action="{{route('cart.delete',$cart->id)}}" method="post">
 @csrf
 <input type="hidden" name="cart_id"/>
 <button type="submit" class="btn btn-danger">Delete</button>
</form>


       </td>
     </tr>
    @endforeach;
<tr>
  <td colspan="4"></td>
  <td>Total Taka</td>
  <td>{{$totalprice}} Taka</td>
</tr>

    </tbody>
    <div class="float-right mb-2">
      <a href="{{route('products')}}" class="btn btn-info  btn-lg">Continue Shopping</a>
      <a href="{{route('checkout')}}" class="btn btn-warning btn-lg">Checkout</a>

    </div>
  </table>

</div>


@endsection
