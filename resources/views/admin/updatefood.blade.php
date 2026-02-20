<base href="/public">
@extends('admin.maindesign')

@section('update_food')

<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center; background-color: #f3f4f6;">

    <div style="width: 450px; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">

        <h2 style="text-align: center; margin-bottom: 20px; font-size: 22px; font-weight: bold;">
            Update Food Item
        </h2>

        @if(session('info'))
            <div style="margin-bottom: 15px; background: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px;">
                {{ session('info') }}
            </div>
        @endif

        <form action="{{ route('admin.postupdatefood',$food->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <input type="text" name="food_name"
                value="{{ $food->food_name }}"
                placeholder="Food Name"
                required
                style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">

            <textarea name="food_details"
                required
                placeholder="Food Details"
                style="padding: 10px; border: 1px solid #ddd; border-radius: 6px; min-height: 120px;">{{ $food->food_details }}</textarea>

            <input type="number"
                name="food_price"
                value="{{ $food->food_price }}"
                min="0"
                required
                placeholder="Food Price"
                style="padding: 10px; border: 1px solid #ddd; border-radius: 6px;">

            <div style="text-align: center;">
                <p style="margin-bottom: 8px;">Old Image</p>
                <img src="{{ asset('food_img/'.$food->food_image) }}"
                     style="width: 120px; border-radius: 8px;">
            </div>

            <input type="file"
                name="food_image"
                accept="image/*"
                style="padding: 5px;">

            <button type="submit"
                style="padding: 12px; background: #2563eb; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                Update Food
            </button>

        </form>
    </div>

</div>

@endsection
