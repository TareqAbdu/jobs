<div class="instoretxt">
   
</div>
<div class="job-list-list mb-15">
    <div class="list-recent-jobs">
        <!-- Item job -->
        <div class="card-job hover-up wow animate__animated animate__fadeIn text-center " style="font-size: bold;">
            <div class="credit " >{{__('Your Package is')}}: <strong style="color:red">{{$package->package_title}} - {{ $siteSetting->default_currency_code }}{{$package->package_price}}</strong></div>
    <div class="credit">
    {{__('Package Duration')}} : 
    <strong style="color:red">{{ Auth::guard('company')->user()->package_start_date }}</strong>
    - 
    <strong style="color:red">{{ Auth::guard('company')->user()->package_end_date }}</strong>
</div>

    <div class="credit">{{__('Availed quota')}} : <strong>{{Auth::guard('company')->user()->availed_jobs_quota}}</strong> / <strong>{{Auth::guard('company')->user()->jobs_quota}}</strong></div>

        </div>

    </div>
</div>

