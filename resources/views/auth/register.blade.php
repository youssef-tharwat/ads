<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="{{asset('form-assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('form-assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('form-assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('form-assets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('form-assets/css/main.css')}}" rel="stylesheet" media="all">
    <style type="text/css">
        .page-wrapper{
            background: #0F78B1;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div style="margin-bottom: 1.5em;
    display: flex;
    justify-content: center;">
            <img style="max-width: 150px;
    max-height: 138px;" class="img-fluid" src="{{asset('form-assets/images/apu.png')}}" alt="">
        </div>
        <div style="display: flex;
    justify-content: center;
    flex-direction: row-reverse;
    align-items: center;
    padding: 1em 0 3em 0;">
            <h1 class="title">Apu Online Docket System</h1>
        </div>
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" required name="name" placeholder="John">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" required name="email" placeholder="test@gmail.com">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" required type="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password Confirmation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="input--style-5" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">TP</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" required type="text" name="tp" placeholder="TP012345" maxlength="8">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Identification Card Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" required name="IDC" placeholder="0123456789" maxlength="10">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Birthday</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" required type="date" name="birthday" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required type="text" name="country_code" placeholder="+60">
                                            <label class="label--desc">Country Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required type="text" name="phone" placeholder="12345678">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Course</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="course" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach($Courses as $course)
                                                <option  selected="selected">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Intake</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" required name="intake" placeholder="UC2F1804SE" maxlength="12">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Avatar</div>
                            <div class="value">
                                <div class="input-group">
                                    <input style="padding: 13px 15px;display: flex;align-items: center;" class="input--style-5" type="file" id="avatar" required name="avatar" >
                                </div>
                            </div>
                        </div>

                        <div style="display: flex;justify-content: space-evenly;" class="mt-lg-auto">
                            <a class="btn btn--radius-2 btn--blue" style="text-decoration: none;"  type="button" href="{{route('login')}}">Login</a>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('form-assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('form-assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('form-assets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('form-assets/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('form-assets/js/global.js')}}"></script>

</body>

</html>
<!-- end document-->