<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
;




Auth::routes();//['register'=>false]
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//الراوتات الافتراضية التي اضافتهاlaravel-ui



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FirstController::class,'mainpage'])->middleware('customauth');

Route::get('/products/{catid?}',[FirstController::class,'GetCategoryProduct']);
Route::get('/category',[FirstController::class,'Getallcategorywithproduct']);
Route::get('/reviews',[FirstController::class,'reviews']);
Route::post('/storereview',[FirstController::class,'storereview']);


Route::get('AddproductImage/{productid?}',[ProductController::class,'AddproductImage'])->middleWare('auth');
Route::get('removeproductphoto/{imageid?}',[ProductController::class,'removeproductphoto'])->middleWare('auth');


Route::get('addproduct',[ProductController::class,'Addproduct'])->middleWare('auth');
//تم استخدام البوابة بالاعلى لفرض المصادقة على المستخدم في هذا الكونترولر وتم استخدامها في الهومكونترولر الافتراضي عبر الكونسترانت
Route::get('/removeproduct/{productid?}',[ProductController::class,'RemoveProduct']);
Route::post('/storeproduct',[ProductController::class,'storeproduct']);

Route::get('/editproduct/{productid?}',[ProductController::class,'EditProduct']);
Route::post('/search',[ProductController::class,function(Request $request){
   $products = Product::where('name','like','%'.$request->searchkey.'%')->get();
   return view('product',['products'=>$products]);

}]);

//
Route::get('/productsTable',[ProductController::class,'productsTable']);
Route::get('/single-product/{productid}',[ProductController::class,'showproduct']);

Route::get('cart',[CartController::class,'cart'])->middleWare('auth');
Route::get('previousorder',[CartController::class,'previousorder'])->middleWare('auth');

Route::get('CompleteOreder',[CartController::class,'CompleteOreder'])->middleWare('auth');
Route::post('StoreOrder',[CartController::class,'StoreOrder']);


Route::get('/addproducttocard/{productid}',function($productid){

    $user_id = Auth()->user()->id;
    $result = Cart::where('user_id',$user_id)->where('product_id',$productid)->first();
    // دالة الوير هي في الحقيقة تجلب مصفوفة

    if($result){
        $result->quantity += 1;
        $result->save();
        //هذا الشرط يقول لو كان يوجد منتج داخل الكارد قم بزيادة الكمية بتاعته بواحد
    }else{
        //هنا مالم يتم الشرط دخلي عنصر جديد في الكارد
    $newcart = new Cart();
    $newcart->product_id = $productid;
    $newcart->user_id = auth()->user()->id;
    $newcart->quantity = 1;
    $newcart->save();
    return redirect('/cart');
    }


})->middleware('auth');

Route::get('/deletecartitem/{cartitem}',function ($cartitem){
    Cart::find($cartitem)->delete();
    return redirect('/cart');

});
Route::post('storeproductImages',[Productcontroller::class,'storeproductImages']);




//localization
Route::post('/lang',function(Request $request){

    session()->put('locale',$request->locale);
    return redirect()->back();


})->name('changelanguage');

Route::get('/admin',function(){
    return view('admin.includes.master');
})->middleware('checkrole:admin');


Route::get('premission',function(){
    return view('admin.includes.adminpremission');
})->middleware('checkrole:admin');





Route::post('/ajax-example', 'AjaxController@ajaxAction')->name('ajax.example');
