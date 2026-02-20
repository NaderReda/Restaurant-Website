<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use  App\Models\Orders;
use App\Models\BookTable;


class AdminController extends Controller
{
    public function addFood(){
        return view('admin.addfood');
    }

    public function postAddFood(Request $request){
        $food=new Food();
        $food->food_name = $request->food_name;
        $food->food_details = $request->food_details;
        $food->food_price = $request->food_price;

        $image = $request->food_image;
        if($request->hasFile('food_image')){
            $image = $request->food_image;
            $image_name = time().'.'.$image->getClientOriginalExtension();//بترجع امتداد الملف الاصلي
            $image->move('food_img',$image_name);
            $food->food_image = $image_name;
        }
         $food->save();
        return redirect()->back()->with('success','Added Successfully');
    }

    public function showFood(){
        $foods = Food::all();
        return view('admin.showfood',compact('foods'));
    }

    public function deleteFood($id){
        $food=Food::find($id);
        $food->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');

    }

    public function updateFood($id){
        $food=Food::find($id);
        return view('admin.updatefood', compact('food'));

    }

    public function postUpdateFood(Request $request, $id){
        $food=Food::find($id);
        $food->food_name = $request->food_name;
        $food->food_details = $request->food_details;
        $food->food_price = $request->food_price;

        $image = $request->food_image;
        if($request->hasFile('food_image')){
            $image = $request->food_image;
            $image_name = time().'.'.$image->getClientOriginalExtension();//بترجع امتداد الملف الاصلي
            $image->move('food_img', $image_name);
            $food->food_image = $image_name;
        }
         $food->save();
        return redirect()->back()->with('info', 'Updated Successfully');
    }

    public function viewOrders(){
        $orders=Orders::all();
        return view('admin.vieworders',compact('orders'));

    }

    public function foodStatusDelivered($id){
        $order=Orders::find($id);
        $order->order_status = "Delivered";
        $order->save();
        return redirect()->back();
    }

    public function foodStateCancel($id){
        $order = Orders::find($id);
        $order->order_status = "Cancel";
        $order->save();
        return redirect()->back();
    }

    public function viewBookedTable(){
        $booked_tables=BookTable::all();
        return view('admin.showbookedtable', compact('booked_tables'));
    }



}
