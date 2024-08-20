

<section class="section-box  mb-md-0">
    <div class="container">
    
        <div class="row mt-60">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                <div class="card-none-bd hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <div class="block-image">
                        <figure><img alt="jobhub" src="{{ asset('new_template/imgs/page/services/job-posted.svg') }}" /></figure>
                    </div>
                    <div class="card-info-bottom">
                        <h3><span class="count"><a href="{{route('posted.jobs')}}">{{Auth::guard('company')->user()->countOpenJobs()}}</a></span></h3>
                        
                        <strong>{{__('Open Jobs')}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                <div class="card-none-bd hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="block-image">
                        <figure><img alt="jobhub" src="{{ asset('new_template/imgs/theme/icons/proof-reading.svg') }} " /></figure>
                    </div>
                    <div class="card-info-bottom">
                        <h3><span class="count"><a href="{{route('company.followers')}}">{{Auth::guard('company')->user()->countFollowers()}}</a></span></h3>
                        <strong>{{__('Followers')}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                <div class="card-none-bd hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="block-image">
                        <figure><img alt="jobhub" src="{{ asset('new_template/imgs/page/services/candidate-call.svg') }}" /></figure>
                    </div>
                    <div class="card-info-bottom">
                        <h3><span class="count"><a href="{{route('company.messages')}}">{{Auth::guard('company')->user()->countCompanyMessages()}}</a></span></h3>
                        <strong>{{__('Messages')}}</strong>
                    </div>
                </div>
            </div>
          
        </div>
      
    </div>
</section>