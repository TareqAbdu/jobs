@extends('layouts.app')

@section('content')

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Company Messages') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Company Messages')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid layout p-0 message-wrapper d-flex">
    <div class="menu-sidebar">
        @include('includes.company_dashboard_menu')
    </div>
    <!-- Sidebar with user list -->
    <div class="user-content pt-4">
    <div class="sideleft col-md-4 p-0 d-flex flex-column">
        <div class="card h-100">
            <div class="card-header">
                <h4>{{ __('Messages') }}</h4>
            </div>
            <div class="list-group list-group-flush message-history flex-grow-1 overflow-auto">
                @if(null !== ($seekers))
                    @foreach($seekers as $seeker)
                        <a href="javascript:;" 
                           class="list-group-item list-group-item-action message-grid" 
                           id="adactive{{ $seeker->id }}" 
                           data-gift="{{ $seeker->id }}" 
                           onclick="show_messages({{ $seeker->id }})">
                            <div class="d-flex w-100 align-items-center">
                                <div class="image">
                                    {!! $seeker->printUserImage(50, 50) !!}
                                </div>
                                <div class="ml-3 user-name">
                                    <h5>{{ $seeker->name }}</h5>
                                    <small class="count-messages">{{ $seeker->countMessages(Auth::guard('company')->user()->id) }} {{ __('Messages') }}</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Message content -->
    <div class="content-area col-md-8 p-0 d-flex flex-column">
        <div class="card h-100">
            <div class="card-header">
                <h4>{{ __('Conversation') }}</h4>
            </div>
            <div class="card-body message-content flex-grow-1 overflow-auto">
                <div id="append_messages" class="messages"></div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
function show_messages(id) {
    $.ajax({
        type: "GET",
        url: "{{ route('company-change-message-status') }}",
        data: { 'sender_id': id },
        success: function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('append-message') }}",
                data: { '_token': $('input[name=_token]').val(), 'seeker_id': id },
                success: function(res) {
                    $('#append_messages').html(res);
                    $(".messages").scrollTop($(".messages")[0].scrollHeight);
                    $('.message-grid').removeClass('active');
                    $("#adactive" + id).addClass('active');
                }
            });
        }
    });
}
</script>
@endpush
