<section class="section-box mt-50 mb-60">
	<div class="container">
		<div class="box-newsletter">
			@if(Auth::guard('company')->check())
				<h5 class="text-md-newsletter">{{ __('Looking for the right talent? Search Jobseekers Today') }}</h5>
			@else
				<h5 class="text-md-newsletter">{{ __('One million success stories. Start yours today') }}</h5>
			@endif
			<h6 class="text-lg-newsletter">{{ __('Find the latest jobs') }}</h6>
			<div class="box-form-newsletter mt-30">
				<form action="{{ route('job.list') }}" method="get" class="form-newsletter">
					<input type="text" class="input-newsletter" name="search" id="jbsearch" value="{{ Request::get('search', '') }}" placeholder="{{ __('Enter Skills or job title') }}" autocomplete="off" />
					<button type="submit" class="btn btn-default font-heading icon-send-letter"><i class="fas fa-search"></i> {{ __('Search') }}</button>
				</form>
			</div>
		</div>
		<div class="box-newsletter-bottom">
			<div class="newsletter-bottom"></div>
		</div>
	</div>
</section>
