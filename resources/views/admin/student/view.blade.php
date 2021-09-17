
    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Students</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Students</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('students.index')}}" class="btn btn-danger"> < Back </a>
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
                                    <div class="card-img-top" style='height: 190px; width: 100%;'>
                                        <img src="/admin/assets/images/dribbble.png" style='height: 200px; width: 100%;' alt="" class=" img-fluid">
                                    </div>
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <!-- .user-avatar -->
                                        @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                <img src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @else
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                <img src="/admin/assets/images/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @endif
                                        <!-- /.user-avatar -->
                                        <h3 class="card-title mb-2">
                                            <a href="#">{{$student->firstname}} {{$student->othernames}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">{{$student->username}}</h6>
                                        <!-- grid row -->
                                        <div class="row">
                                            <!-- grid column -->
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <!-- .metric -->
                                                <div class="metric">
                                                    <p class="metric-label">School Fees</p>
                                                    @if(count($account) > 0)
                                                        <h6 class="metric-value" style="color: green;">({{count($account)}}) Available</h6>
                                                    @else
                                                        <h6 class="metric-value" style="color: green;">({{count($account)}}) Available</h6>
                                                    @endif
                                                </div>
                                                <!-- /.metric -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <!-- .metric -->
                                                <div class="metric">
                                                    <p class="metric-label">Class</p>
                                                    @if(count($account) > 0 && count($class) > 0)
                                                        @foreach($account as $acc)
                                                            @if(count($session) > 0)
                                                                @foreach($session as $sec)
                                                                    @if($sec->category == 'Open')
                                                                        @foreach($class as $cls)
                                                                            @if($acc->classid == $cls->id && $acc->session == $sec->id)
                                                                                <a href="{{route('classes.show', $cls->id)}}"><h6 class="metric-value" style="color: green;">{{$cls->name}}</h6></a>
                                                                            @else
                                                                                
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <h6 class="metric-value" style="color: red;">None Selected</h6>
                                                    @endif
                                                </div>
                                                <!-- /.metric -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <!-- .metric -->
                                                <div class="metric">
                                                    <p class="metric-label">Result</p>
                                                    @if(count($result) > 0)
                                                        <h6 class="metric-value" style="color: green;">({{count($result)}}) Available</h6>
                                                    @else
                                                        <h6 class="metric-value" style="color: green;">({{count($result)}}) Available</h6>
                                                    @endif
                                                </div>
                                                <!-- /.metric -->
                                            </div>
                                            <!-- /grid column -->
                                        </div>
                                        <!-- /grid row -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-fluid">
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="lead" style="background-color: #0b95c3; color: white;"><i class="
                                                fas fa-address-card"></i> Address</p>
                                                <p>{{$student->address}}</p>
                                            </div>
                                        </div>
                                        @if(!empty($student->address2))
                                            <hr class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="lead" style="background-color: #0b95c3; color: white;"><i class="
                                                    fas fa-address-card"></i> Address 2</p>
                                                    <p>{{$student->address2}}</p>
                                                </div>
                                            </div>
                                        @else

                                        @endif
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="lead" style="background-color: #0b95c3; color: white;">
                                                    <i class="fas fa-info-circle"></i> More Information</p>
                                                <p>{{$student->moreinfo}}</p>
                                            </div>
                                        </div>
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> Student Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="msg-tab-simple" data-toggle="tab" href="#msg-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-envelope"></i> Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-tab-simple" data-toggle="tab" href="#account-simple" role="tab" aria-controls="account" aria-selected="false"><i class="fas fa-envelope"></i> Payments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="result-tab-simple" data-toggle="tab" href="#result-simple" role="tab" aria-controls="result" aria-selected="false"><i class="fas fa-cogs"></i> Result</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-user"></i> Username</p>
                                            <p>{{$student->username}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-envelope"></i> Email</p>
                                            <p>{{$student->email}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            @if(empty($student->phoneno2))
                                                <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                                <p>{{$student->phoneno1}}</p>
                                            @else
                                                <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                                <p>{{$student->phoneno1}} / {{$student->phoneno2}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="far fa-calendar-alt"></i> Date Of Birth</p>
                                            <p>{{$student->dob}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            @if($student->livewith == 'parents')
                                                <p class="lead"><i class="fas fa-male"></i> Father's Name</p>
                                                <p>{{$student->fname}}</p>
                                            @elseif($student->livewith == 'guidian')
                                                <p class="lead"><i class="fas fa-male"></i> first guidian's Name</p>
                                                <p>{{$student->fname}}</p>
                                            @else
                                                <p class="lead"><i class="fas fa-male"></i><i class="fas fa-female"></i> Parents</p>
                                                <p style="color: red;">None</p>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            @if($student->livewith == 'parents')
                                                <p class="lead"><i class="fas fa-female"></i> Mother's Name</p>
                                                <p>{{$student->mname}}</p>
                                            @elseif($student->livewith == 'guidian')
                                                <p class="lead"><i class="fas fa-female"></i> second guidian's Name</p>
                                                <p>{{$student->mname}}</p>
                                            @else
                                                <p class="lead"><i class="fas fa-male"></i><i class="fas fa-female"></i> Parents</p>
                                                <p style="color: red;">None</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-street-view"></i> Disable?</p>
                                            <p>{{$student->disability}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-industry"></i> Religion</p>
                                            <p>{{$student->religion}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-hand-holding-heart"></i> Hobby</p>
                                            <p>{{$student->hobby}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-baseball-ball"></i> Prefered Sport</p>
                                            <p>{{$student->sport}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-user-md"></i> Position</p>
                                            <p>{{$student->position}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-warehouse"></i> Class Category</p>
                                            <p>{{$student->category}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-map-marker-alt"></i> Country</p>
                                            <p>{{$student->country}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-location-arrow"></i> State</p>
                                            <p>{{$student->state}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-map"></i> L.G.A</p>
                                            <p>{{$student->lga}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-qrcode"></i> Zipcode</p>
                                            @if(!empty($student->zipcode))
                                                <p>{{$student->zipcode}}</p>
                                            @else
                                                <p style="color: red;">None Entered</p>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="far fa-calendar-alt"></i> Started</p>
                                            <p>Date: {{$student->d}} {{$student->m}} {{$student->y}} / Time: {{$student->time}}</p>
                                        </div>
                                        <div class="col-md-4"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $student->session)
                                                            {{$sec->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                            <p>
                                                @if(count($term) > 0)
                                                    @foreach($term as $ter)
                                                        @if($ter->id == $student->term)
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
                                                <p><a href="{{route('students.edit', $student->id)}}"><i class="fas fa-edit"></i> Edit {{$student->firstname}} Profile</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$student->id}}"><i class="fas fa-trash-alt"></i> Delete {{$student->firstname}} Profile</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <div class="col-md-12 reload">
                                        <p class="lead"><i class="fas fa-cogs"></i> Reset Password</p>
                                        <form id="passform">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="pass">Password</label>
                                                    <input type="hidden" class="form-control" name="id" value="{{$student->id}}"  id="id">
                                                    <input type="text" class="form-control" name="pass" placeholder="Password" id="pass">
                                                    <div class="invalid-feedback">
                                                        Password is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="cpass">Confirm Password</label>
                                                    <input type="text" class="form-control" name="cpass" placeholder="Confirm Password" id="cpass">
                                                    <div class="invalid-feedback">
                                                        Password is required.
                                                    </div><br/>
                                                </div>
                                                <div class="col-md-9">
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#" class="btn btn-primary btn-lg sub" id="sub">Submit</a>
                                                    <br/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="msg-simple" role="tabpanel" aria-labelledby="msg-tab-simple">
                                    @if(count($message) > 0)
                                        @foreach($message as $msg)
                                            <div class="email-list-item">
                                                <div class="email-list-actions">
                                                    <label class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkboxes" type="checkbox" value="cb{{$msg->id}}" id="cb{{$msg->id}}"><span class="custom-control-label"></span></a>
                                                </div>
                                                <div class="email-list-detail"><span class="date float-right">{{$msg->d}} {{$msg->m}} {{$msg->y}}</span><span class="from">{{$msg->sender}}</span>
                                                    <p class="msg">{{$msg->title}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No message has been sent by this student.</p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="account-simple" role="tabpanel" aria-labelledby="account-tab-simple">

                                </div>
                                <div class="tab-pane fade" id="result-simple" role="tabpanel" aria-labelledby="result-tab-simple">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <style type="text/css">
                                            .fixed-table-toolbar .bs-bars, .fixed-table-toolbar .search, .fixed-table-toolbar .columns {
                                                position: relative;
                                                margin-top: 10px;
                                                margin-bottom: 10px;
                                                margin-left: 0px;
                                                margin-right: 5px;
                                                line-height: 34px;
                                            }
                                        </style>
                                        @if(count($result) > 0)
                                            <div id="toolbar" class="">
                                                <select class="form-control">
                                                    <option value="">Export Basic</option>
                                                    <option value="all">Export All</option>
                                                    <option value="selected">Export Selected</option>
                                                </select>
                                            </div>
                                            <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr class="border-0">
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="class" class="border-0">Class</th>
                                                        <th data-field="term" class="border-0">Term</th>
                                                        <th data-field="session" class="border-0">Session</th>
                                                        <th data-field="action" class="border-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="position: relative;">
                                                    @foreach($result as $res)
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                @if(count($class) > 0)
                                                                    @foreach($class as $clas)
                                                                        @if($res->classid == $clas->id && $res->studentid == $student->id)
                                                                            <a href="{{url('/main_controller_panel/results/result/'.$res->id)}}" target="_blank">{{$clas->name}}</a>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(count($term) > 0)
                                                                    @foreach($term as $ter)
                                                                        @if($res->term == $ter->id && $res->studentid == $student->id)
                                                                            {{$ter->name}}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(count($session) > 0)
                                                                    @foreach($session as $sec)
                                                                        @if($res->session == $sec->id && $res->studentid == $student->id)
                                                                            {{$sec->name}}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown" style="text-align: center;">
                                                                    <a href="#" class="dropdown-toggle card-drop" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$res->id}}" aria-controls="submenu-{{$res->id}}">
                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="collapse submenu" id="submenu-{{$res->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                    <!-- item-->
                                                                    <a href="{{url('/main_controller_panel/results/result/'.$res->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div style="text-align: center; font-size: 20px;">
                                                <i>
                                                    <div> No Student Has Been Enrolled Yet!</div>
                                                </i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade show" id="exampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
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

            <div class="modal fade show" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to changes this student password?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" id="passbtn" class="btn btn-primary">Confirm</a>
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
        @endsection