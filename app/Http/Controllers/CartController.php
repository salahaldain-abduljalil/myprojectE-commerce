<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\orderdetails;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function cart(){
    $user = auth()->user()->id;
    $cartproducts = Cart::with('product')->where('user_id',$user)->get();
    //حيث دالة النتج التي بداخل وذ هي اسم الدالة التي في المودل التابع للكارد
    return view('products.cart',['cartproducts'=>$cartproducts]);
}

public function CompleteOreder(){
    $user = auth()->user()->id;
    $cartproducts = Cart::with('product')->where('user_id',$user)->get();
    return view('products.CompleteOreder',['cartproducts'=>$cartproducts]);
}


public function previousorder(){
    $user = auth()->user()->id;
    $result = Order::with('orderdetails')->where('user_id',$user)->get();
    return view('products.previousorder',['orders'=>$result]);
}

public function StoreOrder(Request $request){


    $user = auth()->user()->id;


  $neworder = new Order();
  $neworder->name = $request->name;
  $neworder->address = $request->address;
  $neworder->email = $request->email;
  $neworder->phone = $request->phone;
  $neworder->note = $request->note;
//هنا يعني اخذ البيانات من افورم وخزنها في الاوردر وخزن معها اليوزر اي دي
  $neworder->user_id = $user;
  $neworder->save();


  $cartproducts = Cart::with('product')->where('user_id',$user)->get();
// وهنا نسخ المنتجات التي في السلة وخزنها في اوردرزيتالس
   foreach($cartproducts as $item){
   $neworderdetails = new orderdetails();
   $neworderdetails->product_id = $item->product_id;
   $neworderdetails->quantity =  $item->quantity;
   $neworderdetails->price =  $item->Product->price ;
   $neworderdetails->order_id = $neworder->id;
   $neworderdetails->save();

   }
   cart::where('user_id',$user)->delete();
   //بعد ان يجلب البيانات من السلة يقوم بمسحها

    return redirect('/');

}
}
