@extends('layouts.master')


@section('content')


<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="section-title text-center">
            <h3><span class="orange-text">Product</span> Details</h3>
        </div>
        <div class="row">

            <div class="col-md-6">
                <!-- testimonail-section -->
<div class="testimonail-section mt-80 mb-150">
    <div class="container">
        <div class="row">
            @if($product->productphotos->count() > 1)
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    @foreach ($product->productphotos as $item)
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img style="width:30%; height:300px; max-width:none !important;border:black 5px; border-radius:5px 100px !important;" src="{{asset($item->imagepath)}}" alt="not found">
                        </div>
                        <div class="client-meta">
                            <h3>{{$item-> name}} <span>{{$item-> subject}}</span></h3>
                            <p class="testimonial-body">

                                {{$item -> message}}
                            </p>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            @endif


            <!--End the images of prodcut-->
            <div class="col-md-3">
                <div class="single-product-img">
                    <img src="{{asset($product ->imagepath)}}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product->name}}</h3>
                    <p class="single-product-pricing"><span>الكمية: {{$product -> quantity}}</span> ${{$product -> price}}</p>
                    <p>{{$product -> description}}</p>
                    <p>القسم:{{$product -> Category -> name}}</p>
                    <div class="single-product-form">

                        <a href="/addproducttocard/{{$product -> id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <p><strong>Categories: </strong>Fruits, Organic</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end testimonail-section -->

            </div>
        </div>
    </div>
</div>



<!--show products-->

<div class="container">
<div class="row">


    <div class="section-title text-center">
        <h3><span class="orange-text">Related</span> Products</h3>
    </div>

    </div>
    @foreach ($currentrelated as $item)


    <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="/single-product/{{$item->id}}"><img src="{{url($item ->imagepath)}}" style="max-height: 250px; min-height:250px;" alt=""></a>
            </div>
            <h3>{{$item ->name}}</h3>
            <p class="product-price"><span>{{$item->quantity}}</span> {{$item->price}}$ </p>
            <a href="/addproducttocard/{{$item->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> إضافة إلى السلة</a>


        </div>
    </div>
</div>
    @endforeach
</div>








@endsection
