@extends('layouts.app')

@section('css')
    <style type="text/css">

    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
            <div class="card mt-3">
                <div class="card-header">Create & Assign Users</div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0 !important;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                    <form method="POST" action="{{ route('user.store') }}">

                        @csrf

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="role-dropdown">Role</label>
                                    <select class="form-control" name="role" required id="role-dropdown">
                                        <option>Student</option>
                                        <option>Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" aria-describedby="name" placeholder="Enter name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" aria-describedby="email" placeholder="Enter email" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" id="password" type="password" name="password" aria-describedby="password"  required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" aria-describedby="password_confirmation"  required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="tp-container">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="tp">TP</label>
                                    <input class="form-control" id="tp" type="text" name="tp" placeholder="TP012345" maxlength="8" aria-describedby="tp"  required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="IDC">Identification Card Number</label>
                                    <input class="form-control" id="IDC" type="number"  required name="IDC" placeholder="0123456789" maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="birthday">Birthday</label>
                                    <input class="form-control" id="birthday" type="date"  required name="birthday">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="phone">Phone</label>
                                    <input class="form-control" id="phone" type="text" required name="phone" placeholder="01234567789">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="course-container">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="course">Course</label>
                                    <select class="form-control" name="course" required>
                                        @foreach($courses as $course)
                                            <option>{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="intake-container">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="intake">Intake</label>
                                    <input class="form-control" id="intake" type="text" required name="intake" placeholder="UC2F1804SE" maxlength="12">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="department-container" style="display: none">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="department">Department</label>
                                    <select class="form-control" name="department">
                                            <option>Attendance</option>
                                            <option>Invigilator</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Register</button>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

            $('#role-dropdown').change( function () {

                if ($('#role-dropdown :selected').text() == 'Admin'){

                    $('#department-container').css('display','block');
                    $('select[name=department]').prop('required',true);

                    $('#course-container').css('display','none');
                    $('#tp-container').css('display','none');
                    $('#intake-container').css('display','none');

                    $('select[name=course]').prop('required',false);
                    $('input[name=tp]').prop('required',false);
                    $('input[name=intake]').prop('required',false);

                } else{
                    $('#department-container').css('display','none');
                    $('select[name=department]').prop('required',false);

                    $('#course-container').css('display','block');
                    $('#tp-container').css('display','block');
                    $('#intake-container').css('display','block');

                    $('select[name=course]').prop('required',true);
                    $('input[name=tp]').prop('required',true);
                    $('input[name=intake]').prop('required',true);
                }

            })
    </script>
@endsection