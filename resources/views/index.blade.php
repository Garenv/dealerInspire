<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    {{-- Grabbing compiled from webpack.mix.js file.  The href tag's pointing to the public/css/app.css file --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <title>Dealer Inspire Code Challenge</title>
</head>
<body>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        This is a success alert—check it out!
    </div>
@endif

@if(session()->has('failed'))
    <div class="alert alert-success" role="alert">
        This failed
    </div>
@endif

<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Dealer Inspire Code Challenge</h2>
        </div>
        <div class="row clearfix">
            <form method="POST" action="{{ route('post_data') }}">
                {{csrf_field()}}
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                    <input type="text" name="fullName" placeholder="Full Name" required/>
                </div>
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required/>
                </div>
                <div class="input_field"><span><i aria-hidden="true" class="fa fa-phone"></i></span>
                    <input type="text" name="phoneNumber" placeholder="Phone Number"/>
                </div>
                <div class="input_field">
                    <label for="message" style="display: block; text-align: center;">Message</label>
                    <textarea id="message" cols="41" rows="25" name="message"></textarea>
                </div>
                <input class="button" type="submit" value="Submit"/>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script rel="stylesheet" src="{{ mix('js/app.js') }}"></script>
</body>
</html>




