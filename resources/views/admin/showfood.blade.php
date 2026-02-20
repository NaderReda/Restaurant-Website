<base href="/public">
@extends('admin.maindesign')

@section('show_food')

  <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
    @if(session('success'))
    <div class="alert alert-danger" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <thead style="background-color:#f2f2f2;">
        <tr>
            <th>Food Name</th>
            <th>Food Details</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($foods as $food)
            <tr>
                <td>{{ $food->food_name }}</td>
                <td>{{ $food->food_details }}</td>
                <td>{{ $food->food_price }} EGP</td>
                <td>
                    <img src="{{ asset('food_img/'.$food->food_image) }}"
                         width="150"
                         height="100"
                         style="object-fit:cover;">
                </td>
                <td>
                    <a href="{{ route('admin.update',$food->id) }}" style="color: #2196F3; background-color: #e7f3ff; border-radius: 4px;">Update</a>
                    <a href="{{ route('admin.delete',$food->id) }}" onclick="return confirm('Are you sure delete it ?')" style="color: #f44336; background-color: #e7f3ff; border-radius: 4px;">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
