@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))

            <section id="admin-section">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-sticky-note-o"></i>
                                </div>
                                <div class="mr-5">{{$studentsNumber}} Students</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5">{{$coursesNumber}} Courses</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5">{{$examsNumber}} Exams</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-support"></i>
                                </div>
                                <div class="mr-5">{{$subjectsNumber}} Subjects</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h3 class="mb-3">Exam Attendance 2 Factor Authentication</h3>
                            <form role="form" method="POST" action="/2fa">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input id="2fa" type="text" class="form-control" name="2fa" placeholder="Enter the code you received here." required autofocus>
                                    @if ($errors->has('2fa'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('2fa') }}</strong>
                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-warning" href="{{route('send.code.admin')}}">Send Code</a>
                                    <button class="btn btn-primary" type="submit">Verify</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        @endif

        <section id="student-section">
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('student'))

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-sticky-note-o"></i>
                                </div>
                                <div class="mr-5">{{$totalAttendance}}% Total Attendance</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5">{{ count($totalLowAttendanceSubjects) > 1 ? $totalLowAttendanceSubjects.' Low Attendance Subjects':
                                $totalLowAttendanceSubjects.' Low Attendance Subject' }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5">{{ count($studentExams) > 1 ? $studentExams.' Exams':
                                $studentExams.' Exam' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-support"></i>
                                </div>
                                <div class="mr-5">{{ count($studentSubjects) > 1 ? $studentSubjects.' Subjects':
                                $studentSubjects.' Subject' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h3 class="mb-3">View Exams And Get Dockets</h3>
                            <form role="form" method="POST" action="/2fa-s">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input id="2fa" type="text" class="form-control" name="2fa-s" placeholder="Enter the code you received here." required autofocus>
                                    @if ($errors->has('2fa'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('2fa') }}</strong>
                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-warning" href="{{route('send.code.student')}}">Send Code</a>
                                    <button class="btn btn-primary" type="submit">Verify</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endif
        </section>

    </div>
    <!-- /.container-fluid-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>
@endsection