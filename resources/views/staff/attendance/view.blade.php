
    @extends('layouts.staff')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Attendances</h2>
                            <br><br>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('staff_attendance.index')}}" class="btn btn-danger"> < Back </a>
                    </div>
                    <div class="col-xl-4" id="null">

                    </div>
                    <div class="col-md-12"><br>
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
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-fluid">
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <!-- /.user-avatar -->
                                        <h3 class="card-title mb-2">
                                            <a href="#">{{$attendance->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">
                                            @if(count($classes) > 0)
                                                @foreach($classes as $class)
                                                    @if($class->id == $attendance->classid)
                                                        <a href="{{route('staff_class.show', $class->id)}}">{{$class->name}}</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p style="color: red;">None</p>
                                            @endif
                                        </h6>
                                        <!-- /grid row -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                        <div class="simple-card">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> Attendance Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <p class="lead col-md-7">
                                                    @if(count($classes) > 0)
                                                        @foreach($classes as $class)
                                                            @if($class->id == $attendance->classid)
                                                                Attendance For <a href="{{route('staff_class.show', $class->id)}}">{{$class->name}}</a>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p style="color: red;">None</p>
                                                    @endif
                                                </p>
                                                <p class="lead col-md-5">
                                                    Date: {{$attendance->m}} {{$attendance->d}}, {{$attendance->y}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="col-md-12" style="border: 3px solid; border-color: lightgray;">
                                                <thead>
                                                    <tr style="border: 3px solid; border-color: lightgray;">
                                                        <th style="border: 3px solid; border-color: lightgray; text-align: center;">Names</th>
                                                        <th style="border: 3px solid; border-color: lightgray; text-align: center;">Attendance</th>
                                                        <th style="border: 3px solid; border-color: lightgray; text-align: center;">Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 3px solid; border-color: lightgray;">
                                                    @if(count($students) > 0 && count($accounts) > 0)
                                                        @foreach($students as $student) 
                                                            @foreach($accounts as $account) 
                                                                @if($account->studentid == $student->id && $account->classid == $attendance->classid)
                                                                    @if(count($attendance_lists) > 0)
                                                                        @foreach($attendance_lists as $attendance_list)
                                                                            @if($attendance_list->studentid == $student->id)
                                                                                <tr style="border: 3px solid; border-color: lightgray;">
                                                                                    <td style="border: 3px solid; border-color: lightgray; text-align: center;">
                                                                                        {{$student->firstname}} {{$student->othernames}}
                                                                                    </td>
                                                                                    <td style="border: 3px solid; border-color: lightgray; text-align: center;"> 
                                                                                        @if($attendance_list->attendance == 'Present')
                                                                                            <p style="color: green;">Present</p>
                                                                                        @elseif($attendance_list->attendance == 'Absent')
                                                                                           <p style="color: red;">Absent</p>
                                                                                        @else
                                                                                           <p style="color: blue;">Not Specified</p>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td style="border: 3px solid; border-color: lightgray; text-align: center;"> 
                                                                                        {{$attendance_list->time}}
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table><br>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>
                                                        @if(count($session) > 0)
                                                            @foreach($session as $sec)
                                                                @if($sec->id == $attendance->session)
                                                                    Session: {{$sec->name}}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <p style="color: red;">None</p>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>
                                                        @if(count($term) > 0)
                                                            @foreach($term as $ter)
                                                                @if($ter->id == $attendance->term)
                                                                    Term: {{$ter->name}}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <p style="color: red;">None</p>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10"><br>
                                                    
                                                </div>
                                                <div class="col-md-2"><br>
                                                    <a href="/staff_portal/staff_attend/download/{{$attendance->id}}" style="padding: 10px; padding-left: 20px; padding-right: 20px; margin-bottom: 20px;" class="btn btn-success" target="_blank">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain">
                                        <strong>ERROR!</strong>
                                        <p id="err"></p>
                                        <a href="#" class="close" onclick="document.getElementById('errmain').style.display = 'none';" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </a>
                                    </div>
                                    <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain">
                                        <strong>SUCCESS!</strong>
                                        <p id="suc"></p>
                                        <a href="#" class="close" onclick="document.getElementById('sucmain').style.display = 'none';" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="lead"><i class=" fas fa-qrcode"></i> Options</p>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><a href="{{route('staff_attendance.edit', $attendance->id)}}"><i class="fas fa-edit"></i> Edit Attendance</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$attendance->id}}"><i class="fas fa-trash-alt"></i> Delete Attendance</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="exampleModal{{$attendance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Class data?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="delete-form-{{ $attendance->id }}" method="post" action="{{ route('staff_attendance.destroy',$attendance->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $attendance->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection