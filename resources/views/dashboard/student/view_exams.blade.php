@extends('layouts.app')

@section('css')
    <style type="text/css">
        #dataTable > tfoot{
            display: none;
        }

        #app > div > div > div.card.mb-3 > div.card-body{
            padding:1em 0 ;
        }

        #dataTable_wrapper{
            padding: 0 ;
        }
        #dataTable_wrapper > div:nth-child(3),
        #dataTable_wrapper > div:nth-child(1){
            padding: 0 15px;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">View Exams And Print Dockets</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> View Attendance </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Attendance For Subject</th>
                                <th>Start Date & Time</th>
                                <th>Duration</th>
                                <th>Docket</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $examsArray as $examArray)
                                <tr>
                                    <td>{{$examArray['examName']}}</td>
                                    <td>{{$examArray['subjectAttendance']->attendance}}</td>
                                    <td>{{$examArray['startDate']}}</td>
                                    <td>{{$examArray['duration']}}</td>
                                    <td style="background-color: {{
                                    $examArray['subjectAttendance']->attendance >= 80 ? 'lawngreen' : 'red'
                                    }}"><a href="{{ $examArray['subjectAttendance']->attendance >= 80 ? route('generate.exam.pdf',
                                    [
                                    'id' => \Illuminate\Support\Facades\Auth::user()->id,
                                    'exam_id' => $examArray['id'],
                                    ]) : '#'}}">{{$examArray['subjectAttendance']->attendance >= 80 ? 'Download Docket' : 'Low Attendance' }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
@endsection