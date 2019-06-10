@extends('layout.master')
@section('content')
<div class="container margin-top-20">

  <div class="card card-body">
    <div class="row">

      <div class="col-md-7">
        <h2>confirm order</h2>
     @foreach (App\cart::totalcart() as $cart)
     <p>
  {{$cart->product->title}}-
  <strong>{{$cart->product->price}} Taka</strong>
  -{{$cart->product_quantity}}


     </p>
     @endforeach

      </div>
      <div class="col-md-5">
        <h2>confirm order</h2>
        @php
        $total_price=0;
        @endphp
     @foreach (App\cart::totalcart() as $cart)
       @php
    $total_price+=$cart->product->price*$cart->product_quantity;
    @endphp
     @endforeach
     <p>Total Price:{{ $total_price}}Taka</p>
     <p>Total price with shipping cost:{{$total_price+App\setting::first()->shipping_cost}}</p>


      </div>


    </div>

  </div>

<div class="card card-body mt-2">
    <h2>Shipping Address</h2>
    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

            <div class="col-md-6">
                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="" required>

                @if ($errors->has('phone_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('shipping_address') }}</label>

            <div class="col-md-6">
                <input id="shipping_address" type="text" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address" value="{{
                Auth::check() ? Auth::user()->shipping_address :''}}" required>

                @if ($errors->has('shipping_address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('shipping_address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="paymentmethods" class="col-md-4 col-form-label text-md-right">{{ __('select a payment method') }}</label>

            <div class="col-md-6">
              <select class="form-control" name="paymentmethods_id" id="payments">
                <option value="">select a payment method please</option>
                @foreach ($payment as $pay)
                <option value="{{$pay->short_name}}">{{$pay->name}}</option>

                @endforeach;
              </select>

              @foreach ($payment as $paym)

                @if($paym->short_name=="cashin")
              <div  id="payment_{{$paym->short_name}}"class="hidden">
                  <h3>
                    For Cash IN there is nothing necessary;
                    <br>
                    <small>
                      you will get your product;
                    </small>
                  </h3>
                </div>
                @else
                <div  id="payment_{{$paym->short_name}}"class="hidden">
                  <h3>{{$paym->name}}</h3>
                  <strong>{{$paym->name}} NO:{{$pay->no}}</strong>
                  <br>
                  <strong>{{$paym->type}}</strong>
                  <div class="alert alert-success">
                    please send the money this number
                  </div>



                </div>


                @endif

                @endforeach;
                  <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">

              <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
          <script src="{{asset('js/popper.min.js')}}"></script>
          <script src="{{asset('js/bootstrap.min.js')}}"></script>
          <script type="text/javascript">
          $("#payments").change(function(){
            //alert("hei");
                  $payment_method= $("#payments").val();

                  if($payment_method=="cashin")
                  {
                      $("#payment_cashin").removeClass('hidden');
                         $("#payment_Bkash").addClass('hidden');
                          $("#payment_Rocket").addClass('hidden');

                  }
                  else if($payment_method=="Bkash")
                 {


                       $("#payment_cashin").addClass('hidden');
                          $("#payment_Bkash").removeClass('hidden');
                           $("#payment_Rocket").addClass('hidden');
                              $("#transaction_id").removeClass('hidden');


                 }
                 else if($payment_method=="Rocket")
                 {
                   $("#payment_Rocket").removeClass('hidden');
                   $("#payment_cashin").addClass('hidden');
                   $("#payment_Bkash").addClass('hidden');
                   $("#transaction_id").removeClass('hidden');


                 }









          })

          </script>



            </div>
        </div>














        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>

</div>

@endsection
