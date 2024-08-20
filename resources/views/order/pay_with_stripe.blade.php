@extends('layouts.app')
@section('content') 

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Pay with Stripe') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Pay with Stripe')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="listpgWraper">
    <div class="container-fluid layout">
            @if(Auth::guard('company')->check())
            
            <div class="menu-sidebar">
                @include('includes.company_dashboard_menu')
            </div>
            @else
            <div class="menu-sidebar">
                @include('includes.user_dashboard_menu')
            </div>
            <div cl
            @endif
            <div class="user-content pt-4">
                <div class="userccount">
                    <div class="container">
                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{asset('/')}}images/strip-logo.png" alt="" />
                            <div class="strippckinfo">
                                <h5>{{__('Invoice Details')}}</h5>
                                <div class="pkginfo">{{__('Package')}}: <strong>{{ $package->package_title }}</strong></div>
                                <div class="pkginfo">{{__('Price')}}: <strong>{{ $siteSetting->default_currency_code }}{{ $package->package_price }}</strong></div>

                                @if(Auth::guard('company')->check())
                                <div class="pkginfo">{{__('Can post jobs')}}: <strong>{{ $package->package_num_listings }}</strong></div>
                                @else
                                <div class="pkginfo">{{__('Can apply on jobs')}}: <strong>{{ $package->package_num_listings }}</strong></div>
                                @endif
                                <div class="pkginfo">{{__('Package Duration')}}: <strong>{{ $package->package_num_days }} {{__('Days')}}</strong></div>
                            </div>




                        </div>
                        <div class="col-md-5">
                            <div class="formpanel"> @include('flash::message')
                                <h5>{{__('Strip - Credit Card Details')}}</h5>
                                @php                
                                $route = 'stripe.order.upgrade.package';                
                                if($new_or_upgrade == 'new'){                
                                $route = 'stripe.order.package';                
                                }                
                                @endphp                            
                                {!! Form::open(array('method' => 'post', 'route' => $route, 'id' => 'stripe-form', 'class' => 'form')) !!}                
                                {{ Form::hidden('package_id', $package_id) }}
                                <div class="row">
                                    <div class="col-md-12" id="error_div"></div>
                                    <div class="col-md-12">
                                        <div class="formrow">
                                            <label>{{__('Name on Credit Card')}}</label>
                                            <input class="form-control" id="card_name" placeholder="{{__('Name on Credit Card')}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="formrow">
                                            <label>{{__('Credit card Number')}}</label>
                                            <input class="form-control" id="card_no" placeholder="{{__('Credit card Number')}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="formrow">
                                            <label>{{__('Credit card Expiry Month')}}</label>                     
                                            <select class="form-control" id="ccExpiryMonth">                    
                                                @for ($counter = 1; $counter <= 12; $counter++)
                                                @php
                                                $val = str_pad($counter, 2, '0', STR_PAD_LEFT);
                                                @endphp
                                                <option value="{{$val}}">{{$val}}</option>
                                                @endfor
                                            </select>                    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="formrow">
                                            <label>{{__('Credit card Expiry Year')}}</label>                    
                                            <select class="form-control" id="ccExpiryYear">
                                                @php
                                                $ccYears = MiscHelper::getCcExpiryYears();
                                                @endphp
                                                @foreach($ccYears as $year)
                                                <option value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>                    
                                        </div>
                                    </div>                  
                                    <div class="col-md-12">
                                        <div class="formrow">
                                            <label>{{__('CVV Number')}}</label>
                                            <input class="form-control" id="cvvNumber" placeholder="{{__('CVV number')}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="formrow">
                                            <button type="submit" class="btn">{{__('Pay with Stripe')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
    .userccount{
        background: #f5f7ff;
  padding: 50px;
  border-radius: 10px;
  border-bottom: 3px solid #d71a21;
  margin-bottom: 30px;
  box-shadow: 0px 6px 12px rgb(0 0 0 / 5%);
    }
    img {
        max-width: 100%;
      }
      .strippckinfo {
        background: #fff;
        padding-top: 20px;
        padding-right: 30px;
        margin-bottom: 30px;
      }
      .userccount h5 {
  font-size: 20px;
  color: #555;
  font-weight: 700;
  margin-bottom: 15px;
}
.pkginfo {
  padding: 8px 0;
  border-bottom: 1px solid #eee;
  color: #777;
}
.pkginfo strong {
  color: #d71a21;
  font-weight: 700;
}
.formpanel {
  margin-top: 20px;
}
</style>
@endpush
@push('scripts') 
<script>
    let navigation = document.querySelector('.user-menu .navigation');
    let listpgWraper = document.querySelector('.listpgWraper');

    let toggle = document.querySelector('.user-menu .toggle');
    toggle.onclick = function() {
        navigation.classList.toggle('active');
        listpgWraper.classList.toggle('active');
    }

</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script> 
<script type="text/javascript">
Stripe.setPublishableKey('{{Config::get('stripe.stripe_key')}}');
var $form = $('#stripe-form');
$form.submit(function (event) {
    $('#error_div').hide();
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card_no').val(),
        cvc: $('#cvvNumber').val(),
        exp_month: $('#ccExpiryMonth').val(),
        exp_year: $('#ccExpiryYear').val(),
        name: $('#card_name').val()
    }, stripeResponseHandler);
    return false;
});
function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#error_div').show();
        $('#error_div').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // Submit the form:
        $form.get(0).submit();
    }
}
</script> 
@endpush