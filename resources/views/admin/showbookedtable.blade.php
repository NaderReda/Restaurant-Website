<base href="/public">
@extends('admin.maindesign')

@section('show_bookedtable')

  <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
  
    <thead style="background-color:#f2f2f2;">
        <tr>
            <th>Customer Email</th>
            <th>Number of Guests</th>
            <th>Time</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($booked_tables as $booked)
            <tr>
                <td>{{ $booked->Email }}</td>
                <td>{{ $booked->number_of_guests }}</td>
                <td>{{ $booked->time }} </td>
                <td>{{ $booked->date }}</td>
                
                
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
