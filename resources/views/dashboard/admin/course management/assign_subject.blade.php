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
                <li class="breadcrumb-item active">Assign Subjects</li>
            </ol>

            <div class="card mt-3">
                <div class="card-header">Create & Assign Subjects</div>
                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{route('subject.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="subject_name">Subject Name</label>
                                    <input class="form-control" id="subject_name" type="text" name="subject_name" aria-describedby="subject_name" placeholder="Enter subject name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
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

                        <button class="btn btn-primary btn-block" type="submit">Create & Assign</button>
                    </form>
                </div>
            </div>

        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
@endsection