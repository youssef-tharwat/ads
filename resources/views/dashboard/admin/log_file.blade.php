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
                <li class="breadcrumb-item active">Logfile</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Log Table</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Logged Action</th>
                                <th>Date & Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{$log['username']}}</td>
                                    <td>{{$log['description']}}</td>
                                    <td>{{$log['created_at']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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