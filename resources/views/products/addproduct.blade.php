@extends('layouts.master')
@section('content')

<!--هنا عمل تشيك على اليوزر اذا كان هو نفسه سيظهر له هذا المحتوى مالم سيظهر شئ اخر-->
@if(auth()->check())
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Add</span> Products</h3>
                </div>
            </div>
        </div>

        <div class="row">
            	<!-- contact form -->
				<div class="col-lg-12 mb-5 mb-lg-0 text-center">
					<div class="form-title">
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" action="{{url('storeproduct')}}" id="fruitkha-contact" dir="rtl" enctype="multipart/form-data" onSubmit="return valid_datas( this );">
                            @csrf
							<p>
								<input type="text" required style="width:100%;" placeholder="الأسم" name="name" id="name" value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}

                                    @enderror
                                </span>
							</p>
							<p style="display:flex">
								<input type="number"  style="width:50%;" class="mr-4" placeholder="السعر" name="price" id="price" value="{{old('price')}}">
                                <span class="text-danger">
                                    @error('price')
                                    {{$message}}

                                    @enderror
                                </span>
								<input type="number"  style="width:50%;" placeholder="الكمية" name="quantity" id="quanity" value="{{old('quantity')}}">
                                <span class="text-danger">
                                    @error('quantity')
                                    {{$message}}

                                    @enderror
                                </span>
							</p>
							<p><textarea name="description" id="description" cols="30" rows="10" placeholder="الوصف"></textarea></p>
                            <span class="text-danger">
                                @error('description')
                                {{$message}}

                                @enderror
                              <p>  <select class="form-control" style="margin-bottom: 10px;" name="category_id" id="category_id">
                                @foreach ($allcategory as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>

                                @endforeach
                                </select></p>
                                <span class="text-danger">
                                    @error('category_id')
                                    {{$message}}

                                    @enderror

                            </span>
                            <p>
                                <input type="file" name="photo" class="form-control" id="photo">
                                <span class="text-danger">
                                    @error('photo')
                                    {{$message}}

                                    @enderror
                            </p>
                            <img src="{{asset($Product ->imagepath)}}" width="250" class="ml-4" height="250"/>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="حفظ"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->
</div>
@else
status:{{auth()->check()}}
<!--في الحقيقة ستظهر صفحة لوجين لاننا استخدمنا البوابة-->

@endif



@endsection
