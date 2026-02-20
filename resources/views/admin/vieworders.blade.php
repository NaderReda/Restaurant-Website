@extends('admin.maindesign')

@section('show_order')

<div style="padding: 40px; min-height: 100vh;">

    <h2 style="margin-bottom: 20px; font-size: 22px; font-weight: bold;">
        Orders Management
    </h2>

    @if(session('success'))
        <div id="flash-message"
             style="margin-bottom:20px; padding:12px; background:#d1fae5; color:#065f46; border-radius:6px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.05);">

        <table style="width:100%; border-collapse: collapse;">

            <thead style="background:#111827; color:white;">
                <tr>
                    <th style="padding:12px;">Customer</th>
                    <th style="padding:12px;">Email</th>
                    <th style="padding:12px;">Phone</th>
                    <th style="padding:12px;">Address</th>
                    <th style="padding:12px;">Food</th>
                    <th style="padding:12px;">Qty</th>
                    <th style="padding:12px;">Price</th>
                    <th style="padding:12px;">Status</th>
                    <th style="padding:12px;">Image</th>
                    <th style="padding:12px;">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr style="text-align:center; border-bottom:1px solid #eee;">

                    <td style="padding:12px; font-weight:500;">
                        {{ $order->customer_name }}
                    </td>

                    <td style="padding:12px;">
                        {{ $order->customer_email }}
                    </td>

                    <td style="padding:12px;">
                        {{ $order->customer_phone }}
                    </td>

                    <td style="padding:12px;">
                        {{ $order->customer_Address }}
                    </td>

                    <td style="padding:12px;">
                        {{ $order->food_name }}
                    </td>

                    <td style="padding:12px;">
                        {{ $order->food_quantity }}
                    </td>

                    <td style="padding:12px; font-weight:bold;">
                        {{ $order->food_price }} EGP
                    </td>

                    <td style="padding:12px;">
                    @if($order->order_status == 'Delivered')
                       <span style="
                        padding:6px 14px;
                        border-radius:20px;
                        background:#dcfce7;
                        color:#166534;
                        font-weight:500;">
                        Delivered
                        </span>

                    @elseif($order->order_status == 'In Progress')
                      <span style="
                        padding:6px 14px;
                        border-radius:20px;
                        background:#fef3c7;
                        color:#92400e;">
                         In Progress
                      </span>

                    @else
                        <span style="
                            padding:6px 14px;
                            border-radius:20px;
                            background:#fee2e2;
                            color:#991b1b;">
                            Cancelled
                        </span>
                    @endif
                    </td>

                    <td style="padding:12px;">
                        <img src="{{ asset('food_img/'.$order->food_image) }}"
                                width="90"
                                height="60"
                                style="object-fit:cover; border-radius:6px;">
                    </td>

                    <td style="padding:12px;">
                        <div style="display:flex; justify-content:center; align-items:center; gap:10px;">

                            <a href="{{ route('admin.delivered',$order->id) }}"
                                style="padding:6px 10px; background:#2563eb; color:white; border-radius:6px; text-decoration:none; margin-right:5px;">
                                    Delevered
                            </a>

                            <a href="{{ route('admin.cancel',$order->id) }}"

                               style="padding:6px 10px; background:#dc2626; color:white; border-radius:6px; text-decoration:none;">
                                        Cancel
                            </a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection
