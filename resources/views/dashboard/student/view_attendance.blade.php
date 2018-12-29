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
                <li class="breadcrumb-item active">View Attendance</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> View Attendance </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $attendancesArray as $attendance)
                                <tr>
                                    <td>{{$attendance['subject']}}</td>
                                    <td>{{$attendance['attendance']}}</td>
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