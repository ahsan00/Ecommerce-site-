<form class="form-inline" action="{{route('cart.store')}}" method="post">
  @csrf
  <button type="submit" class="btn btn-warning">
<i class="fa fa-plus"></i>Add Cart</button>
</form>
