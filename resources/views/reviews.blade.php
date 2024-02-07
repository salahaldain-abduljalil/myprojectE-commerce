@extends('layouts.master')
@section('content')


<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">أراء</span> العملاء</h3>
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
						<form method="POST" action="/storereview" id="fruitkha-contact" dir="rtl" onSubmit="return valid_datas( this );">
                            @csrf
							<p style="display:flex">
								<input type="text" required style="width:50%;" placeholder="الأسم" name="name" id="name" value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}

                                    @enderror
                                </span>

                             <input type="text" style="width:50%;"   placeholder="البريد الإلكتروني" class="mr-4" name="email" id="email" value="{{old('email')}}">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}

                                    @enderror
                                </span>


							<p style="display:flex">
								<input type="text"  style="width:50%;"class="ml-4"  placeholder="رقم الهاتف" name="phone" id="phone" value="{{old('phone')}}">
                                <span class="text-danger">
                                    @error('phone')
                                    {{$message}}

                                    @enderror
                                </span>

								<input type="text"  style="width:50%;" placeholder="العنوان" name="subject" id="subject" value="{{old('subject')}}">
                                <span class="text-danger">
                                    @error('subject')
                                    {{$message}}

                                    @enderror
                                </span>
							</p>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="الرأي"></textarea></p>
                            <span class="text-danger">
                                @error('message')
                                {{$message}}

                                @enderror

							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="حفظ"></p>
						</form>
					</div>
				</div>
                <!-- End the form-->
				<div class="col-lg-4">
					<div class="contact-form-wrap">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->
</div>


	<!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						@foreach ($reviews as $item)
                        <div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$item-> name}} <span>{{$item-> subject}}</span></h3>
								<p class="testimonial-body">

                                    {{$item -> message}}
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>

                        @endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
@endsection
