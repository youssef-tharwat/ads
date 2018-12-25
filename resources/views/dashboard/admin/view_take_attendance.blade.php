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
                <li class="breadcrumb-item active">Take Attendance</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> {{$exam->name}} Exam Attendees </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>TP</th>
                                <th>Course</th>
                                <th>intake</th>
                                <th>Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($checkboxStatus as $checkbox)
                                <tr>
                                    <td>{{$checkbox['name']}}</td>
                                    <td>{{$checkbox['tp']}}</td>
                                    <td>{{$checkbox['course']}}</td>
                                    <td>{{$checkbox['intake']}}</td>
                                    <td style="text-align: center;">
                                        <input name="attendance" onchange="checkBoxChange({{$checkbox['id']}}, this)" type="checkbox">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{route('take.attendance.view')}}" class="btn btn-primary">Back</a>

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

        function checkBoxChange(studentId, checkbox){

            let data = {
                'student_id': studentId,
                'checkbox': checkbox.checked,
                'exam_id': {{$exam->id}},
                '_token' : '{{ csrf_token() }}'
            };

            $.ajax({
                url:"{{route('take.attendance.edit', ['id' => $exam->id])}}",
                method:'GET',
                data:{data:data},
                dataType:'json',
                success:function(data)
                {

                }
            })

        }

        $(document).on('load', function () {
            checkBoxChange();

        })
    </script>
@endsection