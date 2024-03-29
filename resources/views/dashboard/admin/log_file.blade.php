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
            <i class="fa fa-angle-up "></i>
        </a>

    </div>
@endsection

@section('js')
    <script type="text/javascript">
       function changeTableHeader() {
           const searchContentHTML = ' <div class="d-flex flex-row" style="align-items:base-line; justify-content:flex-end">' +
               ' <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>\n' +
               ' <div class="dropdown show" style="margin-left:1em;">\n' +
               '            <a class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
               '                Export\n' +
               '            </a>\n' +
               '            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">\n' +
               '\n' +
               '                <a class="dropdown-item" href="{{route('log.export.excel')}}">Export to Excel</a>\n' +
               '                <a class="dropdown-item" href="{{route('log.export.csv')}}">Export to CSV</a>\n' +
               '\n' +
               '            </div>\n' +
               '        </div>' +
               '</div>';
           $('#dataTable_filter').html(searchContentHTML);
       }

       $( document ).ready(function() {
           changeTableHeader();
       });

    </script>
@endsection