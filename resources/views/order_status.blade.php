<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Status') }}
        </h2>
    </x-slot>
    @section('my_order')

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
      
        <thead style="background-color:#f2f2f2;">
            <tr>
                <th>Your Name</th>
                <th>Your Email</th>
                <th>Food Image</th>
                <th>Food Quantity</th>
                <th>Food Price</th>
                <th>Order Current Status</th>
            </tr>
        </thead>
    
        <tbody>
           
            @foreach($my_order as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>
                        <img src="{{ asset('food_img/'.$order->food_image) }}"
                             alt="$order->food_image"
                             width="150"
                             height="100"
                             style="object-fit:cover;">
                    </td>
                    <td>{{ $order->food_quantity }} </td>
                    <td>{{ $order->food_price }} EGP</td>
                    <td>{{ $order->order_status }}</td>
                  
                </tr>
               
            @endforeach
        </tbody>
      </table>
    @endsection
</x-app-layout>