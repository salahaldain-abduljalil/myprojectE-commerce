
@extends('layouts.master')


@section('content')

    <!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
                @foreach ($products as $item)


				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/single-product/{{$item->id}}"><img src="{{url($item ->imagepath)}}" style="max-height: 250px; min-height:250px;" alt=""></a>
						</div>
						<h3>{{session('locale') == 'ar' ? $item->name : $item->nameEN}}</h3>
						<p class="product-price"><span>{{$item->quantity}}</span> {{$item->price}}$ </p>
						<a href="/addproducttocard/{{$item->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> إضافة إلى السلة</a>
                        @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'salesman'))

                        <div class="mt-3">
                            <p> <a href="/removeproduct/{{$item->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> حذف منتج</a>
                                <a href="/editproduct/{{$item->id}}" class="btn btn-primary"><i class="fas fa-trash"></i> تعديل منتج</a></p>
                        </div>
                        @endif


					</div>
				</div>
                @endforeach
                <div style="text-align: center; margin: 0px auto;">
                    {{$products->links()}}
                    <!--  هذا الكود من اجل ظهور الترقيم للصفحات ويظهر لك في كل ضغطة على حسب ما محدد في الكونترولر-->

                </div>

			</div>
		</div>
	</div>
	<!-- end product section -->






@endsection

<style>
    svg{
        height:50px !important;
    }
</style>
