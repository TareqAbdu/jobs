@if($packages->count())



<section class="section-box mt-25 mb-50">
    <div class="container">
        <div class="w-50 w-md-100 mx-auto text-center">
            <h3 class="mb-30 wow animate__animated animate__fadeInUp">{{__('Our Packages')}}</h3>
        </div>
        <div class="block-pricing mt-125 mt-md-50 row">
            @foreach($packages as $package)
            <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <div class="box-pricing-item most-popular">
                    <div class="text-end mb-10">
                        <a href="#" class="btn btn-white-sm">{{$package->package_title}}</a>
                    </div>
                    <div class="box-info-price">
                        <span class="text-price for-month display-month">{{ $siteSetting->default_currency_code }} {{$package->package_price}}</span>
                    </div>

                    <ul class="list-package-feature">
                        <li>{{__('Can post jobs')}} : {{$package->package_num_listings}}</li>
                        <li>{{__('Package Duration')}} : {{$package->package_num_days}} {{__('Days')}}</li>

                    </ul>
                    <div>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#buypack{{$package->id}}" class="btn btn-default btn-shadow ml-40 hover-up">{{__('Buy Now')}}</a>
                    </div>
                </div>
            </div>
			<div class="modal fade" id="buypack{{$package->id}}" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<i class="fas fa-times"></i>
							</button>
							<div class="invitereval">
								<h3>Please Choose Your Payment Method to Pay</h3>

								<div class="totalpay">{{__('Total Amount to pay')}}: <strong>{{ $siteSetting->default_currency_code }}{{$package->package_price}}</strong></div>

								<ul class="btn2s">
									@if($package->package_price > 0)
									@if((bool)$siteSetting->is_paypal_active)
									<li class="order paypal"><a href="{{route('order.package', $package->id)}}"><i class="fab fa-cc-paypal" aria-hidden="true"></i> {{__('pay with paypal')}}</a></li>
									@endif
									@if((bool)$siteSetting->is_stripe_active)
									<li class="order"><a href="{{route('stripe.order.form', [$package->id, 'new'])}}"><i class="fab fa-cc-stripe" aria-hidden="true"></i> {{__('pay with stripe')}}</a></li>
									@endif

									@if((bool)$siteSetting->is_payu_active)
									<li class="order payu"><a href="{{route('payu.order.package', ['package_id='.$package->id, 'type=new'])}}">{{__('pay with PayU')}}</a></li>
									@endif

									@else
									<li class="order paypal"><a href="{{route('order.free.package', $package->id)}}"> {{__('Subscribe Free Package')}}</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
            @endforeach

        </div>
    </div>
    </div>
</section>
@endif