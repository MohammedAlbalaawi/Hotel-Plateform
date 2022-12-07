@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <form method="post" action="{{route('contact.send')}}" id="contact">
                            @csrf

                            <div class="alert alert-success alert-block-success" style="display: none;">
                                <small id="success-msg" class="form-text text-success">ddd</small>
                            </div>

{{--                            <div class="alert alert-danger alert-block-error" style="display: none;">--}}
{{--                                <strong class="error-msg"></strong>--}}
{{--                            </div>--}}

                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <small id="name_error" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email">
                                <small id="email_error" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3" name="message" id="message"></textarea>
                                <small id="message_error" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website btn-submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d204876.1393982904!2d34.24860705111693!3d31.410169678881005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f6da60313a7%3A0x54fb4f8aaad1e63b!2sMetro%20Market!5e1!3m2!1sen!2s!4v1670332159903!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                $('#name_error').text('');
                $('#email_error').text('');
                $('#message_error').text('');
                $('.alert-block-success').css('display','none');

                var _token = $("input[name='_token']").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();

                $.ajax({
                    url: "{{ route('contact.send') }}",
                    type:'POST',
                    dataType: 'json',
                    data: {_token:_token, name:name, email:email,message:message},
                    success: function(data) {
                        // $('.alert-block-success').css('display','block').append('<strong>'+data.success+'</strong>');
                        $('.alert-block-success').css('display','block');
                        $("#success-msg").text(data.success);
                    },
                    error: function (data) {

                        var response = $.parseJSON(data.responseText);
                        $.each( response.errors, function( key, value ) {
                            // $('.alert-block-error').css('display', 'block').append('<strong>' + value[0] + '</strong><br>');
                            $("#"+key+"_error").text(value[0]);
                        });
                    }
                });
            });

        });
    </script>
{{--<script>--}}
{{--    $("#contact").click(function(e){--}}
{{--        e.preventDefault();--}}
{{--        var form = document.querySelector('#contact');--}}
{{--        var data = new FormData(form);--}}

{{--        $.ajax({--}}
{{--            type:'POST',--}}
{{--            url:'/contact/send',--}}
{{--            data:data,--}}
{{--            success:function(data){--}}
{{--                alert(data.success);--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@endsection
