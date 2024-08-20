@extends('layouts.app')
@section('content') 


<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('My Profile') }}</h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('My Profile')}}</li>
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
     
            <div class="menu-sidebar">
                @include('includes.user_dashboard_menu')
            </div>

            <div class="user-content pt-4">
                <div class="userccount">
                    <div class="formpanel mt0"> @include('flash::message') 
                        <!-- Personal Information -->
                        @include('user.inc.profile')                              
                    </div>
                </div>
                
                <div class="userccount">
                    <div class="formpanel mt0">
                        @include('user.inc.summary')                                
                    </div>
                </div>
                
                 <div class="editprofilebox">
                    <div class="formpanel mt-5">
                        <h3>{{__('Build Your Resume')}}</h3>
                        <!-- Personal Information -->
                        @include('user.forms.cv.cvs')
                        @include('user.forms.project.projects')
                        @include('user.forms.experience.experience')
                        @include('user.forms.education.education')
                        @include('user.forms.skill.skills')
                        @include('user.forms.language.languages')
                    </div>
                </div>
            </div>
    </div>  
</div>


@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
    .resumebuildwrap {
  padding: 35px;
  border-radius: 15px;
  box-shadow: 0 0 35px rgba(0,0,0,0.1);
  margin-bottom: 30px;
}
.resumebuildwrap .table th {
  font-weight: 700;
}
.userccount {
  background: #f5f7ff;
  padding: 50px;
  border-radius: 10px;
  border-bottom: 3px solid #d71a21;
  margin-bottom: 30px;
  box-shadow: 0px 6px 12px rgb(0 0 0 / 5%);
}
.formpanel .formrow {
  margin-bottom: 15px;
}
.formpanel .formrow > label {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
  color: #999;
}
.formpanel .form-control {
  height: auto;
  border-radius: 0;
  padding: 10px 13px;
  border-color: #ddd;
}
img {
    max-width: 100%;
  }
  .formpanel .formrow > label.btn {
  color: #fff;
}
.userccount {
  background: #f5f7ff;
  padding: 50px;
  border-radius: 10px;
  border-bottom: 3px solid #d71a21;
  margin-bottom: 30px;
  box-shadow: 0px 6px 12px rgb(0 0 0 / 5%);
}
.resumebuildwrap {
  padding: 35px;
  border-radius: 15px;
  box-shadow: 0 0 35px rgba(0,0,0,0.1);
  
  margin-bottom: 30px;
}
.table > thead {
  vertical-align: bottom;
}
.formpanel .btn:hover {
  background: #222;
}
.formpanel .btn {
  width: 100%;
  color: #fff;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
  font-weight: 700;
  text-transform: uppercase;
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
@include('includes.immediate_available_btn')

<script>
    $(document).on('click', '.btn-close', function() {
        $('.modal').css('display','none');
        $('.modal-backdrop').remove();
        $('.modal').removeAttr('style');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('body').removeAttr('style');    
    });
</script>

<script>
    let navigation = document.querySelector('.user-menu .navigation');
    let listpgWraper = document.querySelector('.listpgWraper');
    
    let toggle = document.querySelector('.user-menu .toggle');
    toggle.onclick = function() {
    navigation.classList.toggle('active');
    listpgWraper.classList.toggle('active');
    }
</script>

@endpush