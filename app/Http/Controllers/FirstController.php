<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function mainpage(){
        $user = Auth::user();
        $result = Category::all();
        //    dd($result); هذه الدالة توقف كود الصفحة وتظهر لك بيانات الجداول
           return view('welcome',['categories' => $result]);

    }


    public function reviews(){
        $review = Review::all();
  return view('reviews',['reviews'=>$review]);
    }

    public function storereview(Request $request){
        $request->validate([
            'name'=>'required|max:100',
            'phone'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',


        ]);
        $newReview = new Review();
        $newReview->name = $request->name;
        $newReview->phone = $request->phone;
        $newReview->email = $request->email;
        $newReview->subject = $request->subject;
        $newReview->message = $request->message;
        $newReview->save();
        return redirect('/reviews');
        return view('/reviews',['reviews'=>$newReview]);

    }


   public function GetCategoryProduct($catid = null) {
    if($catid){

            $result = Product::where('category_id',$catid)->get();
            return view('product',['products' => $result]);
    }else{
        $result = Product::paginate(6);
        return view('product',['products' => $result]);
    }

    }
   public function Getallcategorywithproduct() {
        $category = Category::all();
        $product = Product::all();
        return view('category',['categories'=>$category,'products'=>$product]);
    }



}



