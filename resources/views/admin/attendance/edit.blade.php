@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Attendance</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('attendances.index')}}" class="breadcrumb-link">Attendances</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12">
                    
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{route('attendances.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit attendance</i>
                                </div>
                                <div class="card-body">
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong>
                                            @foreach($errors->all() as $error)
                                                {{$error}}<br/>
                                            @endforeach-->
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div> 
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>SUCCESS!</strong> {{session('success')}}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div>
                                        
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> {{session('error')}}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </div>
                                    @else

                                    @endif
                                    <form action="{{ route('attendances.update', $attendance->id) }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="class">Class</label>
                                                <select class="custom-select d-block w-100" name="class" disabled>
                                                    @if(count($classes) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($classes as $class)
                                                            @if($attendance->classid == $class->id)
                                                                <option selected="selected" value="{{$class->id}}">{{$class->name}}</option>
                                                            @else
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                    @if(count($classes) > 0)
                                                        @foreach($classes as $class)
                                                            @if($attendance->classid == $class->id)
                                                                <input type="hidden" name="class" value="{{$class->id}}">
                                                            @else

                                                            @endif
                                                        @endforeach
                                                    @else
                                                        
                                                    @endif
                                                <div class="invalid-feedback">
                                                    Class is required.
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if(count($students) > 0 && count($accounts) > 0)
                                                    @foreach($students as $student)
                                                        @foreach($accounts as $account) 
                                                            @if($account->studentid == $student->id && $account->classid == $attendance->classid)
                                                                @if(count($attendance_lists) > 0)
                                                                    @foreach($attendance_lists as $attendance_list)
                                                                        @if($attendance_list->studentid == $student->id)
                                                                            <div class="row">
                                                                                <div class="col-md-5 mb-3">
                                                                                    <label for="attendance">{{$student->firstname}} {{$student->othernames}}</label>
                                                                                    <input type="hidden" name="student" value="{{$student->id}}">
                                                                                </div>
                                                                                <div class="col-md-7 mb-3">
                                                                                    <select class="custom-select d-block w-100" name="attendance{{$student->id}}">
                                                                                        <option selected="selected" disabled>Select...</option>
                                                                                        @if($attendance_list->attendance == 'Present')
                                                                                            <option selected value="Present">Present</option>
                                                                                            <option value="Absent">Absent</option>
                                                                                        @elseif($attendance_list->attendance == 'Absent')
                                                                                            <option value="Present">Present</option>
                                                                                            <option selected value="Absent">Absent</option>
                                                                                        @else
                                                                                            <option value="Present">Present</option>
                                                                                            <option value="Absent">Absent</option>
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-9">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-primary btn-lg" type="submit">Update Attendance</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection