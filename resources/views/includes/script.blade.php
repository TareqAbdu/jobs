<script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" data-turbolinks-eval="false"
    data-turbo-eval="false"></script>


<script src="{{ asset('new_template/js/vendor/modernizr-3.6.0.min.js') }}"></script>

<script src="{{ asset('/') }}js/jquery.min.js"></script>

{{--  <script src="{{ asset('new_template/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('new_template/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>  --}}
<script src="{{ asset('new_template/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/') }}js/popper.js"></script> 
<script src="{{ asset('new_template/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/wow.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('new_template/js/plugins/swiper-bundle.min.js') }}"></script>
<!-- Template  JS -->

<script src="{{ asset('new_template/js/main.js?v=1.0') }}"></script> 


<script src="{{ asset('/') }}js/owl.carousel.js"></script>

<script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.tools.min.js">
</script>

<script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.revolution.min.js">
</script> 



<script src="{{ asset('/') }}admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>

<script src="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
    type="text/javascript"></script>
<script src="{{ asset('/') }}admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js"
    type="text/javascript"></script>
<script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
<script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>



{!! NoCaptcha::renderJs() !!}

@stack('scripts')

<!-- Custom js -->

<script src="{{ asset('/') }}js/script.js"></script>

<script type="text/JavaScript">

    $(document).ready(function(){

            $(document).scrollTo('.has-error', 2000);

            });

            function showProcessingForm(btn_id){		

            $("#"+btn_id).val( 'Processing .....' );

            $("#"+btn_id).attr('disabled','disabled');		

            }

        

        setInterval("hide_savedAlert()",7000);

        function hide_savedAlert(){

          $(document).find('.svjobalert').hide();

        }



        $(document).ready(function(){

            $.ajax({

                type: 'get',

                url: "{{ route('check-time') }}",

                success: function(res) {

                        $('.notification').html(res);

                   

                }

            });

        });

        

 </script>
