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
                <li class="breadcrumb-item"><a href="{{route('profile.view', ['id'=>Auth::user()->id])}}">Profile</a></li>
                <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>

                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex" style="justify-content: center;"><img src="{{asset('storage/avatars/'.$user->avatar)}}" class="img-thumbnail" style="max-width: 225px; max-height: 225px;"></div>
                            <div class="card-body">
                                <h4 class="mb-3">Profile Info:</h4>
                               <div class="d-flex" style="justify-content: space-evenly;">
                                  @if(Auth::user()->hasRole('student'))
                                       <div>
                                           <p><strong>Name:</strong> {{$user->name}}</p>
                                           <p><strong>Email:</strong> {{$user->email}}</p>
                                           <p><strong>TP:</strong> {{$user->tp}}</p>
                                           <p><strong>Birthday:</strong> {{$user->birthday}}</p>

                                       </div>
                                       <div>
                                           <p><strong>Identification Number:</strong> {{$user->IDC}}</p>
                                           <p><strong>Course:</strong> {{$user->course}}</p>
                                           <p><strong>Intake:</strong> {{$user->intake}}</p>
                                           <p><strong>Phone Number:</strong> {{$user->phone_number}}</p>
                                       </div>
                                      @elseif($user->course)

                                       <div>
                                           <p><strong>Name:</strong> {{$user->name}}</p>
                                           <p><strong>Email:</strong> {{$user->email}}</p>
                                           <p><strong>TP:</strong> {{$user->tp}}</p>
                                           <p><strong>Birthday:</strong> {{$user->birthday}}</p>

                                       </div>
                                       <div>
                                           <p><strong>Identification Number:</strong> {{$user->IDC}}</p>
                                           <p><strong>Course:</strong> {{$user->course}}</p>
                                           <p><strong>Intake:</strong> {{$user->intake}}</p>
                                           <p><strong>Phone Number:</strong> {{$user->phone_number}}</p>
                                       </div>

                                   @else 
                                       <div>
                                           <p><strong>Name:</strong> {{$user->name}}</p>
                                           <p><strong>Email:</strong> {{$user->email}}</p>
                                           <p><strong>Birthday:</strong> {{$user->birthday}}</p>

                                       </div>
                                       <div>
                                           <p><strong>Identification Number:</strong> {{$user->IDC}}</p>
                                           <p><strong>Department:</strong> {{$user->department}}</p>
                                           <p><strong>Phone Number:</strong> {{$user->phone_number}}</p>
                                       </div>
                                   @endif
                               </div>
                            </div>
                        </div>

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