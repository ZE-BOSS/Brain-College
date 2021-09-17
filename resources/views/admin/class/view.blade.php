


    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">classes</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">classes</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('classes.index')}}" class="btn btn-danger"> < Back </a>
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
                                            <a href="#">{{$clas->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">{{$clas->category}}</h6>
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> Class Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="msg-tab-simple" data-toggle="tab" href="#msg-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user"></i> Students</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-user"></i> Class Teacher</p>
                                            <p>
                                                @if(count($staffs) > 0)
                                                    @foreach($staffs as $staff)
                                                        @if($staff->id == $clas->teacher)
                                                            <a href="{{route('staffs.show', $staff->id)}}"> {{$staff->firstname}} {{$staff->othernames}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-user-circle"></i> Class Captain</p>
                                            <p>
                                                @if(count($students) > 0)
                                                    @foreach($students as $student)
                                                        @if($student->id == $clas->captain)
                                                            <a href="{{route('students.show', $student->id)}}"> {{$student->firstname}} {{$student->othernames}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $clas->session)
                                                            {{$sec->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                            <p>
                                                @if(count($term) > 0)
                                                    @foreach($term as $ter)
                                                        @if($ter->id == $clas->term)
                                                            {{$ter->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><a href="{{route('classes.edit', $clas->id)}}"><i class="fas fa-edit"></i> Edit {{$clas->name}}</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$clas->id}}"><i class="fas fa-trash-alt"></i> Delete {{$clas->name}}</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                </div>
                                <div class="tab-pane fade" id="msg-simple" role="tabpanel" aria-labelledby="msg-tab-simple">
                                    <div class="card">
                                        <div class="campaign-table table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="border-0">
                                                        <th class="border-0">Photo</th>
                                                        <th class="border-0">User Name</th>
                                                        <th class="border-0">Full Name</th>
                                                    </tr>
                                                </thead>
                                                @if(count($students) > 0 && count($session) > 0 && count($accounts) > 0)
                                                    <tbody style="position: relative;">
                                                        @foreach($students as $student)
                                                            @foreach($session as $sec)
                                                                @foreach($accounts as $account)
                                                                    @if($account->classid == $clas->id && $account->session == $sec->id)
                                                                        <tr>
                                                                            <td>
                                                                                @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                                                                                    <a href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                                                        <div class="m-r-10">
                                                                                            <img src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="user" width="35">
                                                                                        </div>
                                                                                    </a>
                                                                                @else
                                                                                    <a href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                                                        <div class="m-r-10">
                                                                                            <img src="/admin/assets/images/dribbble.png" alt="user" width="35">
                                                                                        </div>
                                                                                    </a>
                                                                                @endif
                                                                            </td>
                                                                            <td><a href="{{route('students.show', $student->id)}}">{{$student->username}}</a></td>
                                                                            <td><a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a></td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            <div class="modal fade show" id="exampleModas{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to delete this student data?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form id="delete-form-{{ $student->id }}" method="post" action="{{ route('students.destroy',$student->id) }}" style="display: none">
                                                                              {{ csrf_field() }}
                                                                              {{ method_field('DELETE') }}
                                                                            </form>
                                                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                            <a href="#" onclick="document.getElementById('delete-form-{{ $student->id }}').submit();" class="btn btn-primary">Confirm</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade show" id="showModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" style="display: none;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"><a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a></h5>
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                                                                                <img style="width: 100%;" src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="user" width="35">
                                                                            @else
                                                                                <img style="width: 100%;" src="/admin/assets/images/dribbble.png" alt="user" width="35">
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </tbody>
                                                @else
                                                    <tbody>
                                                        <tr style="align-items: center; text-align: center; font-size: 20px;">
                                                            <td colspan='7'>
                                                                <div> No Student Has Been Enrolled Yet!</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="exampleModal{{$clas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
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
                            <form id="delete-form-{{ $clas->id }}" method="post" action="{{ route('classes.destroy',$clas->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $clas->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection