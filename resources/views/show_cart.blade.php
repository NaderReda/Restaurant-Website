<base href="/public">
@extends('main')

@section('show_cart')

  <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
    @if(session('delete_message'))
    <div class="alert alert-danger" role="alert">
        {{ session('delete_message') }}
    </div>
    @endif
    @if(session('confirm_order'))
    <div class="alert alert-success" role="alert">
        {{ session('confirm_order') }}
    </div>
    @endif
    <thead style="background-color:#f2f2f2;">
        <tr>
            <th>Food Name</th>
            <th>Food Details</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @php
            $total_price=0;
        @endphp
        @foreach($cart_food_info as $cart_food)
            <tr>
                <td>{{ $cart_food->food_name }}</td>
                <td>{{ $cart_food->food_details }}</td>
                <td>{{ $cart_food->food_quantity }} </td>
                <td>{{ $cart_food->food_price }} EGP</td>
                <td>
                    <img src="{{ asset('food_img/'.$cart_food->food_image) }}"
                         alt="$cart_food->food_image"
                         width="150"
                         height="100"
                         style="object-fit:cover;">
                </td>
                <td>
                    <a href="{{ route('delete.cart',$cart_food->id) }}" onclick="return confirm('Are you sure to remove it ?')" style="color: #f44336; background-color: #e7f3ff; border-radius: 4px;">Remove</a>
                </td>
            </tr>
            @php
                $total_price = $total_price+ $cart_food->food_price
            @endphp
        @endforeach
    </tbody>
  </table>
  <h1 style="text-align: center;">Total Price: {{ $total_price }} EGP</h1>
  <div style="text-align: center">
    <form action="{{ route('cart.confirm') }}" method="POST">
        @csrf
        <input style="background-color: greenyellow; border-radius: 11px; padding: 10px; " type="submit" value="confirm_order">
    </form>
  </div>
@endsection
