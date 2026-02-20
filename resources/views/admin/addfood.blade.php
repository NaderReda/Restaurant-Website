<base href="/public">
@extends('admin.maindesign')

@section('add_food')
   <div class="bg-blue-600 px-6 py-4" style="text-align: center;">
    <h2 class="text-x1 font-semibold text-white">Add New Food Item</h2>
   </div>
   <div>
    @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('admin.postaddfood') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; margin: auto;
    gap: 10px; height: 100vh; width: 400px;">
    @csrf
    <input type="text" name="food_name" placeholder="Food title" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    <br>
    <textarea name="food_details" placeholder="Description" cols="30" rows="10" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; min-height: 200px;"></textarea>
    <br>
    <input type="number" name="food_price" placeholder="Price" min="0" step="1" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    <br>
    <input type="file" name="food_image" accept="images/*" required style="padding: 8px;">
    <button type="submit" style="padding: 8px 16px; background: #4cAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Add Food</button>
    </form>
    </div>

@endsection
