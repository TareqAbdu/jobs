

<section class="section-box mt-50 mb-0">
  <div class="container">
      <div class="box-newsletter">
        <div id="alert_messages"></div>   
          <h5 class="text-md-newsletter">{{__('Newsletter')}}</h5>
          <h6 class="text-lg-newsletter">{{__('Subscribe to our newsletter and stay updated.')}}</h6>
          <div class="box-form-newsletter mt-5">
             
                <form method="post"  class="form-newsletter" action="{{ route('subscribe.newsletter')}}" name="subscribe_newsletter_form" id="subscribe_newsletter_form">
                  {{ csrf_field() }}
                  <input type="text" class="input-newsletter" placeholder="{{__('Name')}}" name="name" id="name" required="required">
                  <input type="text"class="input-newsletter" placeholder="{{__('Email')}}" name="email" id="email" required="required">

                  {{--  <input type="text" class="input-newsletter" value="" placeholder="contact.alithemes@gmail.com" />  --}}
                  <button class="btn btn-default font-heading icon-send-letter"  type="button" id="send_subscription_form">{{__('Subscribe')}}</button>
              </form>
          </div>
      </div>
      <div class="box-newsletter-bottom">
          <div class="newsletter-bottom"></div>
      </div>
  </div>
</section>



@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_subscription_form', function () {
            var postData = $('#subscribe_newsletter_form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('subscribe.newsletter') }}",
                data: postData,
                //dataType: 'json',
                success: function (data)
                {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success')
                    {
                        var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#subscribe_newsletter_form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else
                    {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function (index, value)
                        {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });
</script> 
@endpush