<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Grabbing compiled from webpack.mix.js file.  The href tag's pointing to the public/css/app.css file --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <title>Dealer Inspire Code Challenge</title>
</head>
<body>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <span style="display: block; text-align: center;">{{ session()->get('success') }}</span>
    </div>
@endif

@if(session()->has('failed'))
    <div class="alert alert-danger" role="alert">
        <span style="display: block; text-align: center;">{{ session()->get('failed') }}</span>
    </div>
@endif

<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Dealer Inspire Code Challenge</h2>
        </div>
        <div class="row clearfix">
            <form method="POST" id="form" action="{{ route('post_data') }}">
                {{csrf_field()}}

                <span class="fullNameError" style="color: #FF0000;"></span>
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                    <input type="text" class="fullName" name="fullName" placeholder="Full Name" required/>
                </div>

                <span class="emailError" style="color: #FF0000;"></span>
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" class="email" name="email" placeholder="Email"/>
                </div>

                <span class="phoneNumberError" style="color: #FF0000;"></span>
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-phone"></i></span>
                    <input type="text" class="phoneNumber" name="phoneNumber" placeholder="Phone Number"/>
                </div>

                <span class="messageError" style="color: #FF0000;"></span>
                <div class="input_field">
                    <textarea class="message" cols="41" rows="20" name="message" placeholder="Message" required></textarea>
                </div>
                <input class="button" onclick="" type="submit" value="Submit"/>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script rel="stylesheet" src="{{ mix('js/app.js') }}"></script>
</body>
</html>




