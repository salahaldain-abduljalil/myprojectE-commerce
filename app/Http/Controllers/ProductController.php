<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
 public function Addproduct(){
    $user = Auth::user();
    dd($user);
    //الكود اللي فوق يعني عند عملية اضافة المنتج  اعرضلي المستخدم الحالي
    $allcategory = Category::all();
    return view('products.addproduct',['allcategory'=>$allcategory]);
 }
 public function AddproductImage($productid = null){
   $product = Product::find($productid);
   $productImages = ProductPhoto::where('product_id',$productid)->get();
   return view('products.AddproductImage',['product'=>$product,'productimages'=>$productImages,'productid'=>$productid]);
 }
 public function EditProduct($productid = null){
    if($productid != null){
    $currentproduct = Product::find($productid);
    if($currentproduct == null){
        abort(403,"can not find the product");
    }
    $allcategory = Category::all();

//هنا الكود التابع qrcode scanning by screen
    //QrCode::generate('hello , world!');
    $qrCode = QrCode::size(300)->generate('www.salahaddin.com');

    $barcode = DNS1D::getBarcodeHtml('45687443218','C39');
    //dd( $barcode);


    return view('products.editproduct',['Product'=>$currentproduct,'allcategory'=>$allcategory,'qrCode'=>$qrCode,'barcode'=>$barcode]);

    }else{
        return redirect('/addproduct');
    }
 }
 public function productsTable(){
    $products = Product::all();
    return view('products.productsTable',['products'=>$products]);
 }
 public function showproduct($productid){
    $product = Product::with('Category','productphotos')->find($productid);
  $currentrelated =  Product::where('category_id',$product->category_id)->where('id','!=',$productid)->inRandomOrder()->limit(3)->get();
    return view('products.showproduct',['product'=>$product,'currentrelated'=>$currentrelated]);

 }


 public function RemoveProduct($productid = null){
   // dd($productid);
    if($productid){
    $currentproduct = Product::find($productid);
    $currentproduct->delete();
    //we can use this method Product::delete($productid);
    return redirect('/productsTable');
    }
    else{
        abort(403,'please enter image id in the root');
    }
 }

 public function removeproductphoto($imageid = null){
    // dd($productid);
    //كود لحذف الصورة
     if($imageid != null){
   $photo = ProductPhoto::find($imageid);
   $photo->delete();

     //we can use this method Product::delete($productid);
     return redirect('/products');
     }
     else{
         abort(403,'please enter product id in the root');
     }
  }

  public function storeproductImages(Request $request){

    $request->validate([
        'product_id'=>'required',
        'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);

 $photo = new ProductPhoto();
 $photo->product_id = $request->product_id;
 if($request->has('photo')){
    $path = $request->photo->move('uploads',Str::uuid()->ToString().'_'.$request->photo->getClientOriginalName());

 $photo->imagepath = $path;
 //for upload the image
 }

 $photo->save();
    return redirect('/productsTable');



}

 public function storeproduct( Request $request){

    $request->validate([
        'name'=>'required|max:100',
        'price'=>'required',
        'quantity'=>'required',
        'description'=>'required',
        'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);
    //كود لتعديل المنتج
if($request->id){
    $currentproduct = Product::find($request->id);
    $currentproduct->name=$request->name;
    $currentproduct->price=$request->price;
    $currentproduct->quantity = $request->quantity;

    if($request->has('photo')){
        $path = $request->photo->move('uploads',Str::uuid()->ToString() .'_'. $request->photo->getClientOriginalName());
        $currentproduct->imagepath = $path;
        }
        //كود لتعديل رفع الصورة

    $currentproduct->description=$request->description;
    $currentproduct->category_id=$request->category_id;
    $currentproduct->save();
    return redirect('/products');



}else{
//كود إضافة المنتج

$newproduct = new Product();
$newproduct->name = $request->name;
$newproduct->price = $request->price;
$newproduct->quantity = $request->quantity;
$newproduct->description = $request->description;
//dd($request->photo->move('uploads',Str::uuid()->ToString() .'_'. $request->file('photo')->getClientOriginalName()));
$path = '';
if($request->has('photo')){
$path = $request->photo->move('uploads',Str::uuid()->ToString() .'_'. $request->photo->getClientOriginalName());

}
$newproduct->imagepath = $path;
$newproduct->category_id = $request->category_id;

$newproduct->save();

return redirect('/');

//يمكننا إستخدام هذه الطريقة السهل
//Product::create($request->all());


}
}
}
