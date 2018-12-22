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
                <li class="breadcrumb-item active">Assign Exams</li>
            </ol>

            <div class="card mt-3">
                <div class="card-header">Create & Assign Exams</div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{route('exam.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exam_name">Exam Name</label>
                                    <input class="form-control" id="exam_name" type="text" name="exam_name" aria-describedby="exam_name" placeholder="Enter exam name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exam_date">Exam Date & Time</label>
                                    <input class="form-control" id="exam_date" type="datetime-local" name="exam_date" aria-describedby="exam_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="exam_duration">Exam Duration</label>
                                    <input class="form-control" id="exam_duration" type="text" name="exam_duration" aria-describedby="exam_duration" placeholder="2 hours" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="course">Subject</label>
                                    <select class="form-control" name="subject" required>
                                        @foreach($subjects as $subject)
                                            <option>{{$subject->name}}</option>
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